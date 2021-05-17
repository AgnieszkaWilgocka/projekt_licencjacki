<?php

/**
 * Quiz type.
 */
namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class QuizType
 */
class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder->add(
//            'name',
//            TextType::class,
//            [
//                'label' => 'label_name'
//            ]
//        );

        $builder->add(
            'question',
            QuestionType::class
        );

        $builder->add(
            'answer',
            QuestionPossibleAnswerType::class
        );

//        $builder->add(
//            ''
//        )
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
