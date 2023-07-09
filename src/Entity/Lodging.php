<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LodgingRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

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

    #[ORM\OneToMany(mappedBy: 'lodging', targetEntity: Matched::class)]
    private Collection $matcheds;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Date::class, inversedBy: 'lodgings')]
    private Collection $date;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    private ?Department $department = null;

    #[ORM\ManyToOne(inversedBy: 'lodgings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

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


    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function createLodging(Request $request)
{
    $user = $this->getUser();
    $lodging = new Lodging();
    $lodging->setUser($user);

}
}
