<?php

namespace App\Entity;

use App\Repository\DateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateRepository::class)]
class Date
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $entryDate = null;

    #[ORM\Column(length: 255)]
    private ?string $leavingDate = null;

    #[ORM\ManyToMany(targetEntity: Lodging::class, mappedBy: 'date')]
    private Collection $lodgings;

    public function __construct()
    {
        $this->lodgings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntryDate(): ?string
    {
        return $this->entryDate;
    }

    public function setEntryDate(string $entryDate): static
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    public function getLeavingDate(): ?string
    {
        return $this->leavingDate;
    }

    public function setLeavingDate(string $leavingDate): static
    {
        $this->leavingDate = $leavingDate;

        return $this;
    }

    /**
     * @return Collection<int, Lodging>
     */
    public function getLodgings(): Collection
    {
        return $this->lodgings;
    }

    public function addLodging(Lodging $lodging): static
    {
        if (!$this->lodgings->contains($lodging)) {
            $this->lodgings->add($lodging);
            $lodging->addDate($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): static
    {
        if ($this->lodgings->removeElement($lodging)) {
            $lodging->removeDate($this);
        }

        return $this;
    }
}
