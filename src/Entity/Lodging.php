<?php

namespace App\Entity;

use App\Repository\LodgingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LodgingRepository::class)]
class Lodging
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionLod = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageNameLod = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column(length: 255)]
    private ?string $slugLod = null;

    #[ORM\Column(length: 255)]
    private ?string $titleLod = null;

    #[ORM\OneToMany(mappedBy: 'lodging', targetEntity: Matched::class)]
    private Collection $matcheds;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Date::class, inversedBy: 'lodgings')]
    private Collection $date;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Host $host = null;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    private ?Department $department = null;

    public function __construct()
    {
        $this->matcheds = new ArrayCollection();
        $this->date = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionLod(): ?string
    {
        return $this->descriptionLod;
    }

    public function setDescriptionLod(?string $descriptionLod): static
    {
        $this->descriptionLod = $descriptionLod;

        return $this;
    }

    public function getImageNameLod(): ?string
    {
        return $this->imageNameLod;
    }

    public function setImageNameLod(?string $imageNameLod): static
    {
        $this->imageNameLod = $imageNameLod;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getSlugLod(): ?string
    {
        return $this->slugLod;
    }

    public function setSlugLod(string $slugLod): static
    {
        $this->slugLod = $slugLod;

        return $this;
    }

    public function getTitleLod(): ?string
    {
        return $this->titleLod;
    }

    public function setTitleLod(string $titleLod): static
    {
        $this->titleLod = $titleLod;

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
            $matched->setLodging($this);
        }

        return $this;
    }

    public function removeMatched(Matched $matched): static
    {
        if ($this->matcheds->removeElement($matched)) {
            // set the owning side to null (unless already changed)
            if ($matched->getLodging() === $this) {
                $matched->setLodging(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Date>
     */
    public function getDate(): Collection
    {
        return $this->date;
    }

    public function addDate(Date $date): static
    {
        if (!$this->date->contains($date)) {
            $this->date->add($date);
        }

        return $this;
    }

    public function removeDate(Date $date): static
    {
        $this->date->removeElement($date);

        return $this;
    }

    public function getHost(): ?Host
    {
        return $this->host;
    }

    public function setHost(?Host $host): static
    {
        $this->host = $host;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): static
    {
        $this->department = $department;

        return $this;
    }
}
