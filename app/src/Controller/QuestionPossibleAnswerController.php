<?php

/**
 * QuestionPossibleAnswer controller.
 */
namespace App\Controller;

use App\Entity\QuestionPossibleAnswer;
use App\Form\QuestionPossibleAnswerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuestionPossibleAnswerController
 */
class QuestionPossibleAnswerController extends AbstractController
{

    /**
     * @Route(
     *     "/questionanswer/{id}",
     *      requirements={"id": "[1-9]\d*"},
     *     methods={"GET", "PUT"},
     *     name="question_answer"
     * )
     *
     * @param Request $request
     * @param QuestionPossibleAnswer $questionPossibleAnswer
     *
     * @return Response
     */
    public function index(Request $request, QuestionPossibleAnswer $questionPossibleAnswer):Response
    {
        $form = $this->createForm(QuestionPossibleAnswerType::class, $questionPossibleAnswer, ['method' => 'PUT']);
        $form->handleRequest($request);

        return $this->render(
            'question_possible_answer/index.html.twig',
            [
                'form' => $form->createView(),
                'question_possible_answer' => $questionPossibleAnswer,
            ]

        );
    }

//    /**
//     * @param OptionsResolver $resolver
//     */
//    public function configureOptions(OptionsResolver $resolver): void
//    {
//        $resolver->setDefaults(['data_class' => Question::class]);
//    }
//
//
//    /**
//     * @return string
//     */
//    public function getBlockPrefix(): string
//    {
//        return 'question';
//    }
}
