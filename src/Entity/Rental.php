<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use App\Repository\RentalRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

use App\Controller\CreateRentalController;

/**
 * @ApiResource(
 *      normalizationContext={
 *          "groups"={"rentals"}
 *      },
 *      collectionOperations={
 *         "post"={
 *             "controller"=CreateRentalController::class
 *                 },
 *          "get",
 *          "put"
 *      },
 * 
 * )
 * @ORM\Entity(repositoryClass=RentalRepository::class)
 * @ORM\Table(name="rentals")
 * @ApiFilter(DateFilter::class,
 *     properties = {"dueDate" : DateFilter::INCLUDE_NULL_AFTER,
 *                  "startDate" : DateFilter::INCLUDE_NULL_AFTER,
 *                  "endDate" : DateFilter::INCLUDE_NULL_AFTER
 *                   })
 */
class Rental implements TimestampableInterface
{
    use TimestampableTrait;

    //Maximum rental duration in days
    // Je ne peux pas réserver un article plus de 8 jours contigus (même sur plusieurs réservations)
    public const MAX_RENTAL_DURATION = 8;

    //Minimum Duration between 2 rental in days
    public const MINIMUM_DURATION_BEFORE_NEXT_RENTAL = 4;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @ApiProperty(identifier=true)
     * @Groups("rentals")
     * @var Uuid
     */
    private Uuid $id;

    /**
     *  @var DateTimeInterface
     *
     * @ORM\Column(type="date")
     * @Groups("rentals")
     */
    private DateTimeInterface $startDate;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(type="date")
     * @Groups("rentals")
     */
    private DateTimeInterface $dueDate;

    /**
     * @var ?DateTimeInterface
     *
     * @ORM\Column(type="date", nullable=true)
     * @Groups("rentals")
     */
    private ?DateTimeInterface $endDate;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     * @Groups("rentals")
     */
    private ?float $depositPaid = null;

    /**
     * @var User
     *
     * @ORM\ManyToOne (targetEntity=User::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("rentals")
     */
    private User $user;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("rentals")
     * @var Item
     */
    private Item $item;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("rentals")
     */
    private bool $depositReturned = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("rentals")
     * @var bool
     */
    private bool $itemDegraded = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups("rentals")
     * @var ?string
     */
    private ?string $comment;

    /**
     * @ORM\ManyToOne (targetEntity=User::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=true)
     * @Groups("rentals")
     * @var ?User
     */
    private ?User $giveBy;

    /**
     * @ORM\ManyToOne (targetEntity=User::class, inversedBy="rentals")
     * @ORM\JoinColumn(nullable=true)
     * @Groups("rentals")
     * @var ?User
     */
    private ?User $restitutionBy;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=true)
     * @Groups("rentals")
     * @var ?User
     */
    private ?User $cancelBy;

    /**
     * @var ?DateTimeInterface
     * @ORM\Column(type="date", nullable=true)
     * @Groups("rentals")
     */
    private ?DateTimeInterface $cancelDate;

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @param Uuid $id
     * @return $this
     */
    public function setId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeInterface $startDate
     * @return $this
     */
    public function setStartDate(DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDueDate(): DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * @param DateTimeInterface $dueDate
     * @return $this
     */
    public function setDueDate(DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return ?DateTimeInterface
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param ?DateTimeInterface $endDate
     * @return $this
     */
    public function setEndDate(?DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return ?float
     */
    public function getDepositPaid(): ?float 
    {
        return $this->depositPaid;
    }

    /**
     * @param float $depositPaid
     * @return $this
     */
    public function setDepositPaid(float $depositPaid): self
    {
        $this->depositPaid = $depositPaid;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function setItem(Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDepositReturned(): bool
    {
        return $this->depositReturned;
    }

    /**
     * @param bool $depositReturned
     * @return $this
     */
    public function setDepositReturned(bool $depositReturned): self
    {
        $this->depositReturned = $depositReturned;

        return $this;
    }

    /**
     * @return bool
     */
    public function isItemDegraded(): bool
    {
        return $this->itemDegraded;
    }

    /**
     * @param bool $itemDegraded
     * @return $this
     */
    public function setItemDegraded(bool $itemDegraded): self
    {
        $this->itemDegraded = $itemDegraded;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param ?string $comment
     * @return Rental
     */
    public function setComment(string $comment): Rental
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return ?User
     */
    public function getGiveBy(): ?User
    {
        return $this->giveBy;
    }

    /**
     * @param ?User $giveBy
     * @return Rental
     */
    public function setGiveBy(?User $giveBy): Rental
    {
        $this->giveBy = $giveBy;

        return $this;
    }

    /**
     * @return ?User
     */
    public function getRestitutionBy(): ?User
    {
        return $this->restitutionBy;
    }

    /**
     * @param User $restitutionBy
     * @return Rental
     */
    public function setRestitutionBy(User $restitutionBy): Rental
    {
        $this->restitutionBy = $restitutionBy;

        return $this;
    }

    public function getCancelBy(): ?User
    {
        return $this->cancelBy;
    }

    public function setCancelBy(?User $cancelBy): self
    {
        $this->cancelBy = $cancelBy;

        return $this;
    }

    public function getCancelDate(): ?\DateTimeInterface
    {
        return $this->cancelDate;
    }

    public function setCancelDate(\DateTimeInterface $cancelDate): self
    {
        $this->cancelDate = $cancelDate;

        return $this;
    }

}
