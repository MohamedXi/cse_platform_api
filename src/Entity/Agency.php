<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\AgencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AgencyRepository::class)
 * @ORM\Table(name="agencies")
 */
class Agency implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private Uuid $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="agency", orphanRemoval=true)
     * @var Collection<int,Item>
     * @ApiSubresource()
     */
    private Collection $items;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="agency", cascade={"persist"})
     * @var Collection<int,User>
     */
    private Collection $users;

    /**
     * Agency constructor.
     */

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->users = new ArrayCollection();
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
     * @return Collection<int, Item>
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
            $item->setAgency($this);
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
            if ($item->getAgency() === $this) {
                $item->setAgency(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setAgency($this);
        }

        return $this;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAgency() === $this) {
                $user->setAgency(null);
            }
        }

        return $this;
    }

}
