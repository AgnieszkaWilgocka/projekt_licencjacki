<?php

namespace App\Entity;

use App\Repository\UserAnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserAnswerRepository::class)
 */
class UserAnswer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class)
     */
    private $questions;



    /**
     * @ORM\ManyToOne(targetEntity=QuestionPossibleAnswer::class)
     */
    private $question_possible_answer;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestions(): ?Question
    {
        return $this->questions;
    }

    public function setQuestions(?Question $questions): void
    {
        $this->questions = $questions;
    }

    public function getQuestionPossibleAnswer(): ?QuestionPossibleAnswer
    {
        return $this->question_possible_answer;
    }

    public function setQuestionPossibleAnswer(?QuestionPossibleAnswer $question_possible_answer): void
    {
        $this->question_possible_answer = $question_possible_answer;
    }
}
