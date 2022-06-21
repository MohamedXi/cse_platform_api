<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 *     iri="http://schema.org/ItemTypes",
 *     normalizationContext={
 *         "groups"={"item_type_read"}
 *     }
 * )
 * @ORM\Entity(repositoryClass=ItemTypeRepository::class)
 * @ORM\Table(name="item_types")
 */
class ItemType implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @Groups("item_type_read")
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("item_type_read")
     * @var string
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="itemType")
     * @Groups("item_type_read")
     * @var Collection<int,Item>
     */
    private Collection $items;

    /**
     * @ORM\Column(name="rent_price", type="float", nullable=true)
     * @Groups("item_type_read")
     * @var float
     */
    private ?float $rentPrice;

    /**
     * @ORM\Column(name="deposit_amount", type="float", nullable=true)
     * @Groups("item_type_read")
     * @var float
     */
    private ?float $depositAmount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("item_type_read")
     * @var string
     */
    private ?string $icon;

    /**
     * ItemType constructor.
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
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
     * @return Collection<int,Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setItemType($this);
        }

        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getItemType() === $this) {
                $item->setItemType(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of rentPrice
     *
     * @return  float
     */ 
    public function getRentPrice()
    {
        return $this->rentPrice;
    }

    /**
     * Set the value of rentPrice
     *
     * @param  float  $rentPrice
     *
     * @return  self
     */ 
    public function setRentPrice(float $rentPrice)
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    /**
     * Get the value of depositAmount
     *
     * @return  float
     */ 
    public function getDepositAmount()
    {
        return $this->depositAmount;
    }

    /**
     * Set the value of depositAmount
     *
     * @param  float  $depositAmount
     *
     * @return  self
     */ 
    public function setDepositAmount(float $depositAmount)
    {
        $this->depositAmount = $depositAmount;

        return $this;
    }

    /**
     * Get the value of icon
     *
     * @return  string
     */ 
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @param  string  $icon
     *
     * @return  self
     */ 
    public function setIcon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }
}
