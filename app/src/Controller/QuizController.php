<?php

/**
 * Quiz controller
 */
namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuestionPossibleAnswer;
use App\Entity\Quiz;
use App\Form\QuizType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuizController
 */
class QuizController extends AbstractController
{

    /**
     * @Route(
     *     "/quiz",
     *     name="quiz",
     *     methods={"POST", "GET"},
     * )
     *
     * @return Response
     */
    public function index(Request $request):Response
    {
//        $quiz = new Quiz();
        $form = $this->createForm(QuizType::class);
        $form->handleRequest($request);



        return $this->render(
            'quiz/show.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
