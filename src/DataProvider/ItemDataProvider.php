<?php

namespace App\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterExtension;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Item;
use App\Entity\User;
use App\Repository\ItemRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;

class ItemDataProvider implements ContextAwareCollectionDataProviderInterface , RestrictedDataProviderInterface
{
    /** @var ItemRepository  */
    private ItemRepository $itemRepository;

    /** @var QueryCollectionExtensionInterface[]|iterable */
    private iterable $collectionExtensions;

    /** @var Security  */
    private Security $security;

    /**
     * RentalDataProvider constructor.
     * @param ItemRepository $itemRepository
     * @param Security $security
     * @param iterable|array $collectionExtensions
     */
    public function __construct(ItemRepository  $itemRepository, Security $security, iterable $collectionExtensions = [])
    {
        $this->itemRepository = $itemRepository;
        $this->security = $security;
        $this->collectionExtensions = $collectionExtensions;
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return iterable|void
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $queryBuilder = $this->itemRepository->createQueryBuilder('i');
        $queryNameGenerator = new QueryNameGenerator();
        if (key_exists("filters", $context) ) {
            // Apply endDateFilter
            foreach ($this->collectionExtensions as $extension) {
                if ($extension instanceof FilterExtension) {
                    $extension->applyToCollection($queryBuilder, $queryNameGenerator, $resourceClass, $operationName, $context);
                }
            }
        }

        $this->setAgencyFilter($queryBuilder, $context);
        return $queryBuilder->getQuery()->getResult();
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Item::class;

    }
    /**
     * ajouter du filtre sur l'agence
     * @param QueryBuilder $queryBuilder
     */
    private function setAgencyFilter(QueryBuilder $queryBuilder, array $context= []) {
        /** @var User|null $user */
        $user = $this->security->getUser();

        if (!$user instanceof User) {
            throw new AuthenticationException();
        }

        $agencyId = $user->getAgency()->getId()->toBinary();
        /**  ROLE ADMIN  : accès à toutes les agence
         *   ROLE_MAGASINIER || COLLABORATOR : accès qu'à son agence
         */
        if (!$this->security->isGranted(User::ROLE_ADMIN)) {
            if (isset($context['filters']['agency'])) {
                $agencyId = $context['filters']['agency'];
            }
        $this->itemRepository->addAgencyFilter($queryBuilder,  $agencyId);
        }
    }
}
