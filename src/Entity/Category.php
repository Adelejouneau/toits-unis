<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{

    // ====================================================== //
    // ===================== PROPERTIES ===================== //
    // ====================================================== //
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameCat = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $slugCat = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Lodging::class)]
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
        return $this->nameCat;
    }

    // ====================================================== //
    // =================== GETTER / SETTER ================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCat(): ?string
    {
        return $this->nameCat;
    }

    public function setNameCat(string $nameCat): static
    {
        $this->nameCat = $nameCat;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlugCat(): ?string
    {
        return $this->slugCat;
    }

    public function setSlugCat(string $slugCat): static
    {
        $this->slugCat = $slugCat;

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
            $lodging->setCategory($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): static
    {
        if ($this->lodgings->removeElement($lodging)) {
            // set the owning side to null (unless already changed)
            if ($lodging->getCategory() === $this) {
                $lodging->setCategory(null);
            }
        }

        return $this;
    }
}
