<?php

namespace App\Entity;

use App\Repository\GuestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GuestRepository::class)]
class Guest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hobbiesGuest = null;

    #[ORM\Column]
    private ?int $NbrLitsGuest = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHobbiesGuest(): ?string
    {
        return $this->hobbiesGuest;
    }

    public function setHobbiesGuest(?string $hobbiesGuest): static
    {
        $this->hobbiesGuest = $hobbiesGuest;

        return $this;
    }

    public function getNbrLitsGuest(): ?int
    {
        return $this->NbrLitsGuest;
    }

    public function setNbrLitsGuest(int $NbrLitsGuest): static
    {
        $this->NbrLitsGuest = $NbrLitsGuest;

        return $this;
    }
}
