<?php

/**
 * UserAnswer form.
 */
namespace App\Form;

use App\Entity\Question;
use App\Entity\QuestionPossibleAnswer;
use App\Repository\QuestionPossibleAnswerRepository;
use App\Repository\QuestionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class UserAnswerType
 */
class UserAnswerType extends AbstractType
{
//    private $questionRepository;
//
//    public function __construct(QuestionRepository $questionRepository)
//    {
//        $this->questionRepository = $questionRepository;
//    }




//    private $questionEntity = Question::class;




//    /**
//     * UserAnswerType constructor.
//     *
//     * @param Question $question
//     */
//    public function __construct(Question $question)
//    {
//        $this->questionEntity = $question;
//    }
    private $questionPossibleAnswerRepository;

    /**
     * UserAnswerType constructor.
     *
     * @param QuestionPossibleAnswerRepository $questionPossibleAnswerRepository
     */
    public function __construct(QuestionPossibleAnswerRepository $questionPossibleAnswerRepository)
    {
        $this->questionPossibleAnswerRepository = $questionPossibleAnswerRepository;
    }

    /**
     * @param Question $question
     * @return array
     */
    private function getPossibleAnswers(Question $question): array
    {
        $choices = [];
        $answers = $this->questionPossibleAnswerRepository->getAnswerByQuestion($question);
//        $answers = $this->questionPossibleAnswerRepository->queryByQuestion($question);

        foreach ($answers as $answer) {
            $choices[$answer->getId()] = $answer->getContent();
        }

        return $choices;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $question = $this->getPossibleAnswers();
//        $question = Question::class;

        $builder->add(
            'questions',
            EntityType::class,
            [
                'class' => Question::class,
//                'choices' => $this->getPossibleAnswers($question);
                'choice_label' => function(Question $question) {
                    if ($question->getId() == 6) {
                        return $question->getContent();
                    }
                    },
                'disabled' => true,
            ]
        );

        $builder->add(
            'question_possible_answer',
            EntityType::class,
            [
                'class' => QuestionPossibleAnswer::class,
//                'choice_label' => 'question',
//                'query_builder' => $this->questionPossibleAnswerRepository->queryByQuestioon(),
//                'choices' => $this->getPossibleAnswers(),
                'choice_label' => function(QuestionPossibleAnswer $questionPossibleAnswer) {
                if ($questionPossibleAnswer->getQuestion()->getId() == 6) {
////
                    return $questionPossibleAnswer->getContent();
                }
                },
                'expanded' => true
            ]
        );
    }
}
