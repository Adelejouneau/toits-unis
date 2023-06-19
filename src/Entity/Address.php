<?php

namespace App\Entity;
use App\Entity\Association;
use App\Entity\User;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $streetNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $streetName = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Association::class)]
    private Collection $associations;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: User::class)]
    protected Collection $users;

    #[ORM\ManyToOne(inversedBy: 'addresses')]
    private ?Department $department = null;

    public function __construct()
    {
        $this->associations = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(string $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, Association>
     */
    public function getAssociations(): Collection
    {
        return $this->associations;
    }

    public function setAssociation(Association $association): self
    {
        if (!$this->associations->contains($association)) {
            $this->associations->add($association);
            $association->setAddress($this);
        }

        return $this;
    }

    public function removeAssociation(Association $association): self
    {
        if ($this->associations->removeElement($association)) {
            // set the owning side to null (unless already changed)
            if ($association->getAddress() === $this) {
                $association->setAddress(null);
            }
        }

        return $this;
    }

/**
 * @return Collection<int, User>
 */
public function getUsers(): Collection
{
    return $this->users;
}

public function setUser(User $user): self
{
    if (!$this->users->contains($user)) {
        $this->users->add($user);
        $user->setAddress($this);
    }

    return $this;
}

public function removeUser(User $user): self
{
    if ($this->users->removeElement($user)) {
        // set the owning side to null (unless already changed)
        if ($user->getAddress() === $this) {
            $user->setAddress(null);
        }
    }

    return $this;
}

/**
 * @return Collection<int, Department>
 */
public function addAADepartment(Department $department): self
{
    $this->department = $department;

    return $this;
}

}