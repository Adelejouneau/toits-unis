<?php

namespace App\Entity;
use DateTimeImmutable;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
#[Vich\Uploadable]
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

    #[Vich\UploadableField(mapping: 'associations', fileNameProperty: 'imageNameAsso')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumberAsso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailAsso = null;

    #[ORM\Column(length: 255)]
    private ?string $slugAsso = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $immatriculationAsso = null;

    #[ORM\ManyToMany(targetEntity: Department::class, inversedBy: 'associations')]
    private Collection $department;

    public function __construct()
    {
        $this->department = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAsso(): ?string
    {
        return $this->nameAsso;
    }

    public function setNameAsso(string $nameAsso): self
    {
        $this->nameAsso = $nameAsso;

        return $this;
    }

    public function getDescriptionAsso(): ?string
    {
        return $this->descriptionAsso;
    }

    public function setDescriptionAsso(?string $descriptionAsso): self
    {
        $this->descriptionAsso = $descriptionAsso;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getImageNameAsso(): ?string
    {
        return $this->imageNameAsso;
    }

    public function setImageNameAsso(?string $imageNameAsso): self
    {
        $this->imageNameAsso = $imageNameAsso;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

        public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPhoneNumberAsso(): ?string
    {
        return $this->phoneNumberAsso;
    }

    public function setPhoneNumberAsso(string $phoneNumberAsso): self
    {
        $this->phoneNumberAsso = $phoneNumberAsso;

        return $this;
    }

    public function getEmailAsso(): ?string
    {
        return $this->emailAsso;
    }

    public function setEmailAsso(?string $emailAsso): self
    {
        $this->emailAsso = $emailAsso;

        return $this;
    }

    public function getSlugAsso(): ?string
    {
        return $this->slugAsso;
    }

    public function setSlugAsso(string $slugAsso): self
    {
        $this->slugAsso = $slugAsso;

        return $this;
    }

    // public function getImmatriculationAsso(): ?int
    // {
    //     return $this->immatriculationAsso;
    // }

    // public function setImmatriculationAsso(int $immatriculationAsso): static
    // {
    //     $this->immatriculationAsso = $immatriculationAsso;

    //     return $this;
    // }

    /**
     * @return Collection<int, Department>
     */
    public function getDepartment(): Collection
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getImmatriculationAsso(): ?string
    {
        return $this->immatriculationAsso;
    }

    public function setImmatriculationAsso(string $immatriculationAsso): static
    {
        $this->immatriculationAsso = $immatriculationAsso;

        return $this;
    }


    public function addDepartment(Department $department): static
    {
        if (!$this->department->contains($department)) {
            $this->department->add($department);
        }

        return $this;
    }

    public function removeDepartment(Department $department): static
    {
        $this->department->removeElement($department);

        return $this;
    }

}