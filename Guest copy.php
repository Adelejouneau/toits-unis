<?php

namespace App\Entity;
use App\Entity\User;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GuestRepository;
use Symfony\Component\Mime\Address;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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

    #[ORM\ManyToOne(inversedBy: 'user')]
    #[ORM\JoinColumn(nullable: false)]
    protected ?Address $address = null;

    #[ORM\OneToMany(mappedBy: 'guest', targetEntity: Matched::class)]
    private Collection $matcheds;

    public function __construct()
    {
        // parent::__construct();
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

    public function setHobbiesGuest(?string $hobbiesGuest): self
    {
        $this->hobbiesGuest = $hobbiesGuest;
        return $this;
    }

    public function getNbrLitsGuest(): ?int
    {
        return $this->NbrLitsGuest;
    }

    public function setNbrLitsGuest(?int $NbrLitsGuest): self
    {
        $this->NbrLitsGuest = $NbrLitsGuest;
        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): self
    {
        $this->association = $association;
        return $this;
    }

    public function getAddressId(): ?Address
    {
        return $this->address;
    }

    public function setAddressId(?Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Collection<int, Matched>
     */
    public function getMatcheds(): Collection
    {
        return $this->matcheds;
    }

    public function addMatched(Matched $matched): self
    {
        if (!$this->matcheds->contains($matched)) {
            $this->matcheds->add($matched);
            $matched->setGuest($this);
        }
        return $this;
    }

    public function removeMatched(Matched $matched): self
    {
        if ($this->matcheds->removeElement($matched) && $matched->getGuest() === $this) {
            $matched->setGuest(null);
        }
        return $this;
    }
}
