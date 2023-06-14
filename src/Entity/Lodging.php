<?php

namespace App\Entity;

use App\Repository\LodgingRepository;
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
}
