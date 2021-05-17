<?php

/**
 * Question entity.
 */
namespace App\Entity;

use App\Repository\QuestionPossibleAnswerRepository;
use App\Repository\QuestionRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ORM\Table(name="questions")
 */
class Question extends ServiceEntityRepository
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
     * @ORM\ManyToOne(targetEntity=Quiz::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $quiz;

    /**
     * @ORM\OneToMany(targetEntity=QuestionPossibleAnswer::class, mappedBy="question")
     */
    private $question_possible_answer;

    public function __construct()
    {
        $this->question_possible_answer = new ArrayCollection();
    }




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
     * @return Quiz|null
     */
    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    /**
     * @param Quiz|null $quiz
     */
    public function setQuiz(?Quiz $quiz): void
    {
        $this->quiz = $quiz;
    }

    /**
     * @return Collection|QuestionPossibleAnswer[]
     */
    public function getQuestionPossibleAnswer(): Collection
    {
        return $this->question_possible_answer;
    }

    public function addQuestionPossibleAnswer(QuestionPossibleAnswer $questionPossibleAnswer): self
    {
        if (!$this->question_possible_answer->contains($questionPossibleAnswer)) {
            $this->question_possible_answer[] = $questionPossibleAnswer;
            $questionPossibleAnswer->setQuestion($this);
        }

        return $this;
    }

    public function removeQuestionPossibleAnswer(QuestionPossibleAnswer $questionPossibleAnswer): self
    {
        if ($this->question_possible_answer->removeElement($questionPossibleAnswer)) {
            // set the owning side to null (unless already changed)
            if ($questionPossibleAnswer->getQuestion() === $this) {
                $questionPossibleAnswer->setQuestion(null);
            }
        }

        return $this;
    }

//    public function getAnswerByQuestion(): Collection
//    {
////        $criteria = QuestionRepository::createAnswerByQuestion();
//        $criteria = Criteria::create()
//            ->andWhere(Criteria::expr()->eq('question.id', $this->getId()));
//
//        return $this->question_possible_answer->matching($criteria);
//    }




}
