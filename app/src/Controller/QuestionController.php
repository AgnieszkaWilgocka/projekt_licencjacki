<?php

/**
 * Question controller.
 */
namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuestionPossibleAnswer;
use App\Form\QuestionType;
use App\Repository\QuestionPossibleAnswerRepository;
use App\Repository\QuestionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuestionController
 *
 * @Route("/question")
 */
class QuestionController extends AbstractController
{

    private $questionRepository;
//    private $questionPossibleAnswerRepository;


    public function __construct(QuestionRepository $questionRepository)
//                                QuestionPossibleAnswerRepository $questionPossibleAnswerRepository)
    {
        $this->questionRepository = $questionRepository;
//        $this->questionPossibleAnswerRepository = $questionPossibleAnswerRepository;
    }


    /**
     * @return Response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name ="question_index"
     *     )
     */
    public function index():Response
    {
//        return $this->render('question/index.html.twig',
//        ['question' => $this->questionRepository->queryAll()]);
        $question = $this->getDoctrine()
            ->getRepository('App:Question')
            ->findAll();

        return $this->render(
            'question/index.html.twig',
//            ['question' => $question]
            array('question' => $question)
        );
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/sendQuiz",
     *     name="sendQuiz",
     *     methods={"GET","POST"})
     */
    public function sendQuiz(Request $request): Response
    {
        $counter = 0;
        $data_form = implode(",", $request->request->all());
        $data = explode(",", $data_form);
        $length = count($data);

        for ($i = 0; $i<$length; $i++ ) {
            if ($data[$i] == '1')
            {
                $counter ++;
            }
        }
        return $this->render(
            'question/all_answers.html.twig',
            ['counter' => $counter]
        );
    }



//    /**
//     *
//
//     * @param Question $question
//     *
//     * @return Response
//     *
//     * @Route(
//     *     "/{id}",
//     *     name="question",
//     *     methods={"GET"},
//     *     requirements={"id": "[1-9]\d*"},
//     *     )
//
//     */
//    public function show(Question $question):Response
//    {
////        $form = $this->createForm(QuestionType::class, $question, ['method' => 'PUT']);
////        $form->handleRequest($request);
//
//
////        if ($form->isSubmitted() && $form->isValid())
////        {
////            $possibleAnswer = $form->get('question_possible_answer')->getData();
////            $this->questionRepository->save($question);
////            $this->questionPossibleAnswerRepository->save($possibleAnswer);
////        }
//
//        return $this->render(
//            'question/show.html.twig',
//            ['question' => $question]
////            [
////                'form' => $form->createView(),
////                'question' => $question,
////            ]
//        );
//    }
}
