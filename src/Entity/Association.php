<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
class Association
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameAsso = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionAsso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $websiteUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageNameAsso = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumberAsso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailAsso = null;

    #[ORM\Column(length: 255)]
    private ?string $slugAsso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAsso(): ?string
    {
        return $this->nameAsso;
    }

    public function setNameAsso(string $nameAsso): static
    {
        $this->nameAsso = $nameAsso;

        return $this;
    }

    public function getDescriptionAsso(): ?string
    {
        return $this->descriptionAsso;
    }

    public function setDescriptionAsso(?string $descriptionAsso): static
    {
        $this->descriptionAsso = $descriptionAsso;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): static
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getImageNameAsso(): ?string
    {
        return $this->imageNameAsso;
    }

    public function setImageNameAsso(?string $imageNameAsso): static
    {
        $this->imageNameAsso = $imageNameAsso;

        return $this;
    }

    public function getPhoneNumberAsso(): ?string
    {
        return $this->phoneNumberAsso;
    }

    public function setPhoneNumberAsso(string $phoneNumberAsso): static
    {
        $this->phoneNumberAsso = $phoneNumberAsso;

        return $this;
    }

    public function getEmailAsso(): ?string
    {
        return $this->emailAsso;
    }

    public function setEmailAsso(?string $emailAsso): static
    {
        $this->emailAsso = $emailAsso;

        return $this;
    }

    public function getSlugAsso(): ?string
    {
        return $this->slugAsso;
    }

    public function setSlugAsso(string $slugAsso): static
    {
        $this->slugAsso = $slugAsso;

        return $this;
    }
}
