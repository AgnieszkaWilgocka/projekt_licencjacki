<?php

/**
 * QuestionPossibleAnswer entity
 */
namespace App\Entity;

use App\Repository\QuestionPossibleAnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionPossibleAnswerRepository::class)
 * @ORM\Table(name="questions_possible_answers")
 */
class QuestionPossibleAnswer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_correct;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="question_possible_answer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;



    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return bool|null
     */
    public function getIsCorrect(): ?bool
    {
        return $this->is_correct;
    }

    /**
     * @param bool $is_correct
     */
    public function setIsCorrect(bool $is_correct): void
    {
        $this->is_correct = $is_correct;
    }

    /**
     * @return Question|null
     */
    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    /**
     * @param Question|null $question
     */
    public function setQuestion(?Question $question): void
    {
        $this->question = $question;

    }

}
