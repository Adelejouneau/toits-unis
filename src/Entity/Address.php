<?php

namespace App\Entity;
use App\Entity\Association;
use App\Entity\User;
use App\Entity\Department;

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
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Department::class)]
    private Collection $departments;


    public function __construct()
    {
        $this->associations = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->departments = new ArrayCollection();
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
     * @return Collection<int, AADepartment>
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): self
{
    if (!$this->departments->contains($department)) {
        $this->departments->add($department);
    }

    return $this;
}

public function removeDepartment(Department $department): self
{
    $this->departments->removeElement($department);

    return $this;
}

}