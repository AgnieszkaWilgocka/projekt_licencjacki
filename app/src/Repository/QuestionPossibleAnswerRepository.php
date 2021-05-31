<?php


namespace App\Repository;

use App\Entity\Question;
use App\Entity\QuestionPossibleAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Cast\Object_;
use function Sodium\add;

/**
 * @method QuestionPossibleAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionPossibleAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionPossibleAnswer[]    findAll()
 * @method QuestionPossibleAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionPossibleAnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionPossibleAnswer::class);
    }

    public function save(QuestionPossibleAnswer $questionPossibleAnswer)
    {
        $this->_em->persist($questionPossibleAnswer);
        $this->_em->flush($questionPossibleAnswer);
    }

//    public function getPossibleAnswer(QuestionPossibleAnswer $questionPossibleAnswer):Collection
//    {
//        if ($questionPossibleAnswer->getQuestion()->getId() == )
//
//    }

//    /**
//     * @param Question $question
//     * @return Collection
//     */
//    public function getAnswerByQuestion(Question $question): Collection
//    {
////        $table = [];
//        $answers = $question->getQuestionPossibleAnswer();
//
//        $temp = "";
//        foreach ($answers as $answer) {
//            if ($question->getId() == $answer->getId()) {
//                $temp = $answer;
//            }
//        }
//
//        return $temp;
//    }


    public function queryByQuestion(Question $question): QueryBuilder
    {
        $queryBuilder = $this->queryAll();
        $queryBuilder->andWhere('question_possible_answer.question = :question')
            ->setParameter('question', $question);
//            ->getQuery();
//        return $this->getOrCreateQueryBuilder()
//            ->andWhere('question_possible_answer.question = :question')
//            ->setParameter('question', $question);

    }

    public function queryAll():QueryBuilder
    {
        return $this->getOrCreateQueryBuilder()
            ->select(
                'question_possible_answer',
                'partial question.{id}'
            )
            ->innerJoin('question_possible_answer.question', 'question');
    }

    public function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('question_possible_answer');
    }

    // /**
    //  * @return QuestionPossibleAnswer[] Returns an array of QuestionPossibleAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionPossibleAnswer
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
