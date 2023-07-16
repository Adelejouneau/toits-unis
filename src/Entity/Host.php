<?php

namespace App\Entity;

use App\Repository\HostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HostRepository::class)]
class Host
{

    // ====================================================== //
    // ===================== PROPERTIES ===================== //
    // ====================================================== //
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: false, length: 255)]
    private ?string $entreprise = null;

    #[ORM\Column(nullable: false, length: 255)]
    private ?string $fonction = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\OneToMany(mappedBy: 'hosts', targetEntity: Lodging::class)]
    private Collection $lodging;

    // ====================================================== //
    // =============== CONSTRUCT FUNCTION =================== //
    // ====================================================== //

    public function __construct()
    {
        $this->lodging = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUNCTION =================== //
    // ====================================================== //

    public function __toString(): string
    {
        return $this->lastName;
    }

// ====================================================== //
// =================== GETTER / SETTER ================== //
// ====================================================== //


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return Collection<int, Lodging>
     */
    public function getLodging(): Collection
    {
        return $this->lodging;
    }

    public function addLodging(Lodging $lodging): static
    {
        if (!$this->lodging->contains($lodging)) {
            $this->lodging->add($lodging);
            $lodging->setHost($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): static
    {
        if ($this->lodging->removeElement($lodging)) {
            // set the owning side to null (unless already changed)
            if ($lodging->getHost() === $this) {
                $lodging->setHost(null);
            }
        }

        return $this;
    }


}
