<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{

    // ====================================================== //
    // ===================== PROPERTIES ===================== //
    // ====================================================== //
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $typeEquip = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionEquip = null;

    #[ORM\ManyToMany(targetEntity: Lodging::class, mappedBy: 'equipements')]
    private Collection $lodgings;

    // ====================================================== //
    // =============== CONSTRUCT FUNCTION =================== //
    // ====================================================== //

    public function __construct()
    {
        $this->lodgings = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUNCTION =================== //
    // ====================================================== //

    public function __toString(): string
    {
        return $this->typeEquip;
    }

    // ====================================================== //
    // =================== GETTER / SETTER ================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEquip(): ?string
    {
        return $this->typeEquip;
    }

    public function setTypeEquip(string $typeEquip): static
    {
        $this->typeEquip = $typeEquip;

        return $this;
    }

    public function getDescriptionEquip(): ?string
    {
        return $this->descriptionEquip;
    }

    public function setDescriptionEquip(string $descriptionEquip): static
    {
        $this->descriptionEquip = $descriptionEquip;

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
            $lodging->addEquipements($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): self
    {
        if ($this->lodgings->removeElement($lodging)) {
            $lodging->removeEquipements($this);
        }

        return $this;
    }

}
