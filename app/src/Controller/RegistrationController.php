<?php

/**
 * Registration controller.
 *
 */
namespace App\Controller;

use App\Entity\User;
use App\Entity\UserData;
use App\Form\RegistrationType;
use App\Repository\UserDataRepository;
use App\Repository\UserRepository;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

/**
 * Class RegistrationController
 *
 */
class RegistrationController extends AbstractController
{

    private $userRepository;

    private $userDataRepository;

    /**
     * RegistrationController constructor.
     *
     * @param UserRepository     $userRepository
     * @param UserDataRepository $userDataRepository
     */
    public function __construct(UserRepository $userRepository, UserDataRepository $userDataRepository)
    {
        $this->userRepository = $userRepository;
        $this->userDataRepository = $userDataRepository;
    }

    /**
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler    $guardHandler
     * @param LoginFormAuthenticator       $formAuthenticator
     *
     * @return \Symfony\Component\HttpFoundation\Response|null
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/register",
     *     name="app_register",
     *     methods={"GET", "POST"},
     *
     * )
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $formAuthenticator)
    {
        $user = new User();
        $userData = new UserData();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $user->getPassword()
                )
            );
            $user->setUserData($userData);
            $user->setRoles([User::ROLE_USER]);
            $this->userRepository->save($user);
            $this->userDataRepository->save($userData);

            $this->addFlash('success', 'action_account_create');

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $formAuthenticator,
                'main'
            );
        }

        return $this->render(
            'registration/register.html.twig',
            [
                'form' => $form->createView(),
                'user' => $user,
            ]
        );
    }
}
