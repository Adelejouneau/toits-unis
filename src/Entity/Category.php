<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
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
}
