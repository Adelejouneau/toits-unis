<?php

namespace App\Entity;

use App\Repository\DateRepository;
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
}
