<?php

namespace App\Entity;

use App\Entity\Host;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LodgingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\Collection;

#[ORM\Entity(repositoryClass: LodgingRepository::class)]
#[Vich\Uploadable]
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

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'lodgings', fileNameProperty: 'imageNameLod')]
    private ?File $imageFile = null;


    #[ORM\Column(length: 255)]
    private ?string $slugLod = null;

    #[ORM\Column(length: 255)]
    private ?string $titleLod = null;


    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;


    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    private ?Department $department = null;

    #[ORM\ManyToOne(targetEntity: Host::class, inversedBy: 'lodgings')]
    private ?Host $hosts = null;



    #[ORM\Column(type: Types::TEXT)]
    private ?string $addressLod = null;

    #[ORM\Column]
    private ?int $zipcodeLod = null;

    #[ORM\Column(length: 255)]
    private ?string $cityLod = null;
  

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

        // if (null !== $imageFile) {
        //     // It is required that at least one field changes if you are using doctrine
        //     // otherwise the event listeners won't be called and the file is lost
        //     $this->updatedAt = new \DateTimeImmutable();
        // }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
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


    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

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

    public function getHost(): ?Host
{
    return $this->hosts;
}

public function setHost(?Host $host): self
{
    $this->hosts = $host;

    return $this;
}

    public function getAddressLod(): ?string
    {
        return $this->addressLod;
    }

    public function setAddressLod(string $addressLod): static
    {
        $this->addressLod = $addressLod;

        return $this;
    }

    public function getZipcodeLod(): ?int
    {
        return $this->zipcodeLod;
    }

    public function setZipcodeLod(int $zipcodeLod): static
    {
        $this->zipcodeLod = $zipcodeLod;

        return $this;
    }

    public function getCityLod(): ?string
    {
        return $this->cityLod;
    }

    public function setCityLod(string $cityLod): static
    {
        $this->cityLod = $cityLod;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): static
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements->add($equipement);
            $equipement->addLodging($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        if ($this->equipements->removeElement($equipement)) {
            $equipement->removeLodging($this);
        }

        return $this;
    }
}
