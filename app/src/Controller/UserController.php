<?php

/**
 * User Controller.
 */
namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePassword;
use App\Form\ChangePasswordType;
use App\Repository\UserRepository;
//use http\Env\Request;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserController
 *
 * @Route(
 *     "/user"
 * )
 */
class UserController extends AbstractController
{
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route(
     *     "/",
     *     name="user_index"
     * )
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param UserRepository $userRepository
     * @param PaginatorInterface $paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, UserRepository $userRepository, PaginatorInterface $paginator)
    {
        $page = $request->query->getInt('page', '1');
        $pagination = $paginator->paginate(
            $userRepository->queryAll(),
            $page,
            UserRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render(
            'user/index.html.twig',
            ['pagination' => $pagination]
        );
//        $pagination = $paginator->paginate(
//            $userRepository->queryAll(),
//            $request->query->getInt('page', 1)
//        )
    }

    /**
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="user_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     *
     * @IsGranted(
     *     "USER_VIEW",
     *     subject="user",
     * )
     * @param User $user
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(User $user)
    {
        return $this->render(
            'user/show.html.twig',
            [
                'user' => $user
            ]
        );
    }

    /**
     * @Route(
     *     "/change_password/{id}",
     *     methods={"GET", "PUT"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="change_password"
     * )
     * @param Request $request
     * @param User $user
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function changePassword(Request $request, User $user, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $form = $this->createForm(ChangePasswordType::class, $user, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $this->userRepository->save($user);

            return $this->redirectToRoute('main_page');
        }

        return $this->render(
            'user/change_password.html.twig',
            [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
//
//    public function index(\Symfony\Component\HttpFoundation\Request $request)
}