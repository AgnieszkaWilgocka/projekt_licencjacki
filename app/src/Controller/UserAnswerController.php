<?php

/**
 * UserAnswer Controller.
 */
namespace App\Controller;

use App\Entity\Question;
use App\Entity\UserAnswer;
use App\Form\UserAnswerType;

use App\Repository\UserAnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserAnswerController
 */
class UserAnswerController extends AbstractController
{
    private $userAnswerRepository;

    /**
     * UserAnswerController constructor.
     *
     * @param UserAnswerRepository $userAnswerRepository
     */
    public function __construct(UserAnswerRepository $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }

    /**
     *  /**
     * @Route(
     *     "/q",
     *     name="q",
     *     methods={"GET"},
     *     requirements={"id": "[1-9]\d*"},
     * )
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function show(Request $request): Response
    {

        $userAnswer = new UserAnswer();
        $form = $this->createForm(UserAnswerType::class);
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid()) {
            $this->userAnswerRepository->save($userAnswer);
        }
        return $this->render(
            'quiz/qa.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}

