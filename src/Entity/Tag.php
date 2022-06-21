<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ORM\Table(name="tags")

 */
class Tag implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, mappedBy="tags")
     * @var Collection<int,Item>
     */
    private Collection $items;

    /**
     * Tag constructor.
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
            if(!$item->getTags()->contains($this)){
                $item->addTag($this);
            }
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
            $item->removeTag($this);
        }

        return $this;
    }
}
