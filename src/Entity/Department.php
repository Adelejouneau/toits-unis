<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameDepartment = null;

    #[ORM\Column]
    private ?int $codeDepartment = null;

    #[ORM\OneToMany(mappedBy: 'department', targetEntity: Lodging::class)]
    private Collection $lodgings;

    #[ORM\ManyToMany(targetEntity: Association::class, mappedBy: 'department')]
    private Collection $associations;

    public function __construct()
    {
        $this->lodgings = new ArrayCollection();
        $this->associations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDepartment(): ?string
    {
        return $this->nameDepartment;
    }

    public function setNameDepartment(string $nameDepartment): self
    {
        $this->nameDepartment = $nameDepartment;

        return $this;
    }

    public function getCodeDepartment(): ?int
    {
        return $this->codeDepartment;
    }

    public function setCodeDepartment(int $codeDepartment): self
    {
        $this->codeDepartment = $codeDepartment;

        return $this;
    }

    /**
     * @return Collection<int, Lodging>
     */
    public function getLodgings(): Collection
    {
        return $this->lodgings;
    }

    public function addLodging(Lodging $lodging): self
    {
        if (!$this->lodgings->contains($lodging)) {
            $this->lodgings->add($lodging);
            $lodging->setDepartment($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): self
    {
        if ($this->lodgings->removeElement($lodging)) {
            // set the owning side to null (unless already changed)
            if ($lodging->getDepartment() === $this) {
                $lodging->setDepartment(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return $this->getNameDepartment();
    }

    /**
     * @return Collection<int, Association>
     */
    public function getAssociations(): Collection
    {
        return $this->associations;
    }

    public function addAssociation(Association $association): static
    {
        if (!$this->associations->contains($association)) {
            $this->associations->add($association);
            $association->addDepartment($this);
        }

        return $this;
    }

    public function removeAssociation(Association $association): static
    {
        if ($this->associations->removeElement($association)) {
            $association->removeDepartment($this);
        }

        return $this;
    }
}
