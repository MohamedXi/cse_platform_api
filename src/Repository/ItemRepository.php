<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $agencyId
     * @return QueryBuilder
     */
    public function addAgencyFilter(QueryBuilder $queryBuilder,  string $agencyId): QueryBuilder {

        $uuid = Uuid::fromString($agencyId);
        return $queryBuilder->join('i.agency', 'a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $uuid->toBinary());
    }
}
