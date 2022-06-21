<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="users")
 * @ApiFilter(SearchFilter::class,
 *     properties = {
 *     "username" : "exact"
 *     })
 */
class User implements TimestampableInterface, UserInterface
{
    use TimestampableTrait;

    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_COLLABORATOR = 'ROLE_COLLABORATOR';
    // Role Magasinier
    public const ROLE_STOREKEEPER = 'ROLE_STOREKEEPER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     * @var Uuid
     */
    private Uuid $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @var string
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private string $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private string $lastName;

     /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var ?string
     */
    private ?string $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @var string
     */
    private string $email;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private bool $active;


    /**
     * @ORM\OneToMany(targetEntity=Rental::class, mappedBy="user", orphanRemoval=true)
     * @var Collection<int,Rental>
     */
    private Collection $rentals;

    /**
     * @ORM\ManyToOne (targetEntity=Agency::class, inversedBy="users")
     * @var Agency
     */
    private Agency $agency;

    /**
     * @ORM\Column(type="json")
     * @var string[]
     */
    private array $roles = [self::ROLE_USER];
    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->rentals = new ArrayCollection();
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param ?string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, Rental>
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
            $rental->setUser($this);
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
            if ($rental->getUser() === $this) {
                $rental->setUser(null);
            }
        }

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
     * @return $this
     */
    public function setAgency(Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }


    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier()
    {
       return $this->username;
    }

    public function addRoles(array $roles): self
    {
        foreach ($roles as $role) {
            $role = mb_strtoupper($role);

            if (!\in_array($role, $this->roles, true)) {
                $this->roles[] = $role;
            }
        }

        return $this;
    }

}
