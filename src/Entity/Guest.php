<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GuestRepository::class)]
class Guest extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hobbiesGuest = null;

    #[ORM\Column]
    private ?int $NbrLitsGuest = null;

    #[ORM\ManyToOne(inversedBy: 'guests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Association $association = null;

    #[ORM\OneToMany(mappedBy: 'guest', targetEntity: Matched::class)]
    private Collection $matcheds;

    public function __construct()
    {
        $this->matcheds = new ArrayCollection();
    }

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

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): static
    {
        $this->association = $association;

        return $this;
    }

    /**
     * @return Collection<int, Matched>
     */
    public function getMatcheds(): Collection
    {
        return $this->matcheds;
    }

    public function addMatched(Matched $matched): static
    {
        if (!$this->matcheds->contains($matched)) {
            $this->matcheds->add($matched);
            $matched->setGuest($this);
        }

        return $this;
    }

    public function removeMatched(Matched $matched): static
    {
        if ($this->matcheds->removeElement($matched)) {
            // set the owning side to null (unless already changed)
            if ($matched->getGuest() === $this) {
                $matched->setGuest(null);
            }
        }

        return $this;
    }
}
