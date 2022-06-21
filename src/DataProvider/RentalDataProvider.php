<?php

namespace App\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterExtension;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Rental;
use App\Entity\User;
use App\Repository\RentalRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;

class RentalDataProvider implements ContextAwareCollectionDataProviderInterface , RestrictedDataProviderInterface
{
    /** @var RentalRepository  */
    private RentalRepository $rentalRepository;

    /** @var QueryCollectionExtensionInterface[]|iterable */
    private iterable $collectionExtensions;

    /** @var Security  */
    private Security $security;

    /**
     * RentalDataProvider constructor.
     * @param RentalRepository $rentalRepository
     * @param Security $security
     * @param iterable|array $collectionExtensions
     */
    public function __construct(RentalRepository $rentalRepository, Security $security, iterable $collectionExtensions = [])
    {
        $this->rentalRepository = $rentalRepository;
        $this->security = $security;
        $this->collectionExtensions = $collectionExtensions;
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return Rental[]|iterable
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->rentalRepository->createQueryBuilder('r');
        $queryNameGenerator = new QueryNameGenerator();

        if (key_exists("filters", $context) ) {
            // Apply endDateFilter
            foreach ($this->collectionExtensions as $extension) {
                if ($extension instanceof FilterExtension) {
                    $extension->applyToCollection($queryBuilder, $queryNameGenerator, $resourceClass, $operationName, $context);
                }
            }
        }

        $this->setAgencyFilter($queryBuilder);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Rental::class;
    }

    /**
     * ajouter du filtre sur l'agence
     * @param QueryBuilder $queryBuilder
     */
     private function setAgencyFilter(QueryBuilder $queryBuilder) {
        /** @var User|null $user */
        $user = $this->security->getUser();

        if (!$user instanceof User) {
            throw new AuthenticationException();
        }

        $agenceId = $user->getAgency()->getId()->toBinary();
        /**  ROLE ADMIN  : accès à toutes les agence
         *   ROLE_MAGASINIER || COLLABORATOR : accès qu'à son agence
         */
        if ($this->security->isGranted(User::ROLE_ADMIN)) {
            if (isset($context['filters']['agency'])) {
                $agenceId = $context['filters']['agency'];
            }
        }

        $this->rentalRepository->addAgencyFilter($queryBuilder,  $agenceId);
    }
}
