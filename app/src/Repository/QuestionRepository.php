<?php

namespace App\Repository;

use App\Entity\Question;
use App\Entity\QuestionPossibleAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Collection;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

//    /**
//     * @param Question $question
//     * @return QuestionPossibleAnswer
//     */
//    public function getAnswerByQuestion(Question $question): QuestionPossibleAnswer
//    {
//        if ($question->getId() == $question->getQuestionPossibleAnswer()->get('id')) {
//            return
//        }
//
//    }
//    public function createAnswerByQuestion(): Criteria
//    {
//        $criteria = Criteria::create()
//            ->andWhere(Criteria::expr()->eq('question.id', Question::getId()));
//
//    }
//    public function findAll(): array
//    {
//        return $this->
//    }

    /**
     * @param Question $question
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Question $question)
    {
        $this->_em->persist($question);
        $this->_em->flush($question);
    }

//    public function queryAll():QueryBuilder
//    {
//        return $this->getOrCreateQueryBuilder()
//            ->select('question');
//    }

    public function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('question');
    }

    // /**
    //  * @return Question[] Returns an array of Question objects
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
    public function findOneBySomeField($value): ?Question
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
