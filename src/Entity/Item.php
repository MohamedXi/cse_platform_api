<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use App\Repository\ItemRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Uid\Uuid;

/**
 * @ApiResource(
 *     iri="http://schema.org/Item",
 *     normalizationContext={
 *         "groups"={"item_read"}
 *     }
 * )
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 * @ORM\Table(name="items")
 * @ApiFilter(SearchFilter::class,
 *     properties = {
 *     "name" : "partial",
 *     "description" : "partial",
 *     "agency.name" : "exact",
 *     "tags.name" : "partial",
 *     "itemType.name" : "partial"
 *     })
 * @ApiFilter(DateFilter::class,
 *     properties = {"endDateAvailable" : DateFilter::INCLUDE_NULL_AFTER})
 */
class Item implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @Groups({"item_read"})
     */
    private Uuid $id;

    /**
     * @ORM\ManyToOne(targetEntity=Agency::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     * @var Agency
     * @Groups("item_read")
     */
    private Agency $agency;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     * @Groups("item_read")
     */
    private ?float $depositAmount;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     * @Groups("item_read")
     */
    private string $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var ?string
     * @Groups("item_read")
     */
    private ?string $description;
    /**
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="item", cascade={"persist", "remove", "refresh", "merge"}, fetch="EAGER")
     * @var Collection<int, Image>|ArrayCollection<int, Image>
     */
    private Collection $images;

    /**
     * @SerializedName("images")
     * @Groups("item_read")
     * @return Collection
     */
    public function getImagesUrls() {
        return $this->getImages()->map(function (Image $image) {
            return $image->getFilePath();
        });
    }

    /**
     * @ORM\Column(type="float")
     * @var float
     * @Groups("item_read")
     */
    private float $rentPrice;

    /**
     * @ORM\ManyToOne(targetEntity=ItemType::class, inversedBy="item")
     * @var ItemType
     * @Groups("item_read")
     */
    private ItemType $itemType;

    /**
     * @ORM\OneToMany(targetEntity=Rental::class, mappedBy="item")
     * @var Collection<int, Rental>
     * @Groups("item_read")
     */
    private Collection $rentals;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="items", cascade={"persist"})
     * @var Collection<int,Tag>
     * @Groups("item_read")
     */
    private Collection $tags;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @var ?DateTimeInterface
     * @Groups("item_read")
     */
    private ?DateTimeInterface $endDateAvailable;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     * @Groups("item_read")
     */
    private bool $weekendDisponibility = false;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     * @Groups("item_read")
     */
    private bool $weekDisponibility = true;

    /**
     * Item constructor.
     */
    public function __construct()
    {
        $this->rentals = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

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
     * @return Agency
     */
    public function getAgency(): Agency
    {
        return $this->agency;
    }

    /**
     * @param Agency $agency
     * @return self
     */
    public function setAgency(Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return ?float
     */
    public function getDepositAmount(): ?float
    {
        return $this->depositAmount;
    }

    /**
     * @param ?float $depositAmount
     * @return $this
     */
    public function setDepositAmount(?float $depositAmount): self
    {
        $this->depositAmount = $depositAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Image $image
     * @return $this
     */
    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setItem($this);
        }

        return $this;
    }

    /**
     * @param Image $image
     * @return $this
     */
    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getItem() === $this) {
                $image->setItem(null);
            }
        }

        return $this;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @return float
     */
    public function getRentPrice(): float
    {
        return $this->rentPrice;
    }

    /**
     * @param float $rentPrice
     * @return $this
     */
    public function setRentPrice(float $rentPrice): self
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    /**
     * @return ItemType
     */
    public function getItemType(): ItemType
    {
        return $this->itemType;
    }

    /**
     * @param ItemType $itemType
     * @return $this
     */
    public function setItemType(ItemType $itemType): self
    {
        $this->itemType = $itemType;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getRentals(): Collection
    {
        return $this->rentals;
    }

    /**
     * @param Rental $rental
     * @return $this
     */
    public function addRental(Rental $rental): self
    {
        if (!$this->rentals->contains($rental)) {
            $this->rentals->add($rental);
            $rental->setItem($this);
        }

        return $this;
    }

    /**
     * @param Rental $rental
     * @return $this
     */
    public function removeRental(Rental $rental): self
    {
        if ($this->rentals->removeElement($rental)) {
            // set the owning side to null (unless already changed)
            if ($rental->getItem() === $this) {
                $rental->setItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            if (!$tag->getItems()->contains($this)) {
                $tag->getItems()->add($this);
            }
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->getItems()->removeElement($this);
        }

        return $this;
    }

    /**
     * @return ?DateTimeInterface
     */
    public function getEndDateAvailable(): ?DateTimeInterface
    {
        return $this->endDateAvailable;
    }

    /**
     * @param ?DateTimeInterface $endDateAvailable
     * @return $this
     */
    public function setEndDateAvailable(DateTimeInterface $endDateAvailable = null): self
    {
        $this->endDateAvailable = $endDateAvailable;

        return $this;
    }

    /**
     * @return DateTimeInterface
     * @Groups("item_read")
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getWeekDisponibility(): ?bool
    {
        return $this->weekDisponibility;
    }

    public function setWeekDisponibility(bool $weekDisponibility): self
    {
        $this->weekDisponibility = $weekDisponibility;

        return $this;
    }

    public function getWeekendDisponibility(): bool
    {
        return $this->weekendDisponibility;
    }

    public function setWeekendDisponibility(bool $weekendDisponibility): self
    {
        $this->weekendDisponibility = $weekendDisponibility;

        return $this;
    }
}
