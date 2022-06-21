<?php

namespace App\Repository;

use App\Entity\Rental;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

/**
 * @method Rental|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rental|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rental[]    findAll()
 * @method Rental[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rental::class);
    }


    /**
     * @param QueryBuilder $queryBuilder
     * @param string $agencyId
     * @return QueryBuilder
     */
    public function addAgencyFilter(QueryBuilder $queryBuilder,  string $agencyId): QueryBuilder {
        
        $uuid = Uuid::fromString($agencyId);
        return $queryBuilder->join('r.item', 'i')
            ->join('i.agency', 'a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $uuid->toBinary());
    }

    /**
     * endDate != null &&   ($startDate - 4 ) < endDate < $startDate
     * ||
     * endDate === null &&   ($startDate - 4 ) < dueDate < $startDate

     *  ($dueDate) < startDate < $dueDate+4
     *
     */
    public function hasNeighboringRentals(User $user, Rental $rental): bool {

        $minimumDurationBeforeNextRental = Rental::MINIMUM_DURATION_BEFORE_NEXT_RENTAL;
        $startDay = $rental->getStartDate();
        $startDayLimit = (clone $startDay)->modify("-$minimumDurationBeforeNextRental days");

        $dueDate =  $rental->getDueDate();
        $dueDateLimit = (clone $dueDate)->modify("+$minimumDurationBeforeNextRental days");

        $itemId =$rental->getItem()->getId()->toBinary();
        $userId = $user->getId()->toBinary();

        $count = $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->join('r.user','u')
            ->join('r.item','i')
            ->where('u.id = :userId')
            ->andWhere('i.id = :iId')
            ->andWhere('r.endDate IS NOT NULL AND r.endDate BETWEEN :startDayLimit AND :startDay
                        OR r.endDate IS NULL AND r.dueDate BETWEEN :startDayLimit AND :startDay
                        OR r.startDate BETWEEN :dueDate AND :dueDateLimit')

            ->setParameter('userId', $userId)
            ->setParameter('iId', $itemId)
            ->setParameter('startDayLimit',$startDayLimit->format('Y-m-d'))
            ->setParameter('startDay',$startDay->format('Y-m-d'))
            ->setParameter('dueDate',$dueDate->format('Y-m-d'))
            ->setParameter('dueDateLimit',$dueDateLimit->format('Y-m-d'))
            ->getQuery()
            ->getSingleScalarResult();

        return (bool) $count;
    }

    // /**
    //  * @return Rental[] Returns an array of Rental objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rental
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
