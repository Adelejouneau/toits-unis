<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Vich\UploaderBundle\Entity\File;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Vich\Uploadable]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    protected ?string $email = null;

    #[ORM\Column]
    protected array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    protected ?string $password = null;

    /**
     * @var string The plain password confirmation
     */
    protected ?string $plainPassword = null;

    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Your first name must be at least {{ limit }} characters long',
        maxMessage: 'Your first name cannot be longer than {{ limit }} characters',
    )]
    #[ORM\Column(length: 255)]
    private ?string $nameAsso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $websiteUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumberAsso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageNameAsso = null;

    #[Vich\UploadableField(mapping: 'associations', fileNameProperty: 'imageNameAsso')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    protected ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'user')]

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 255)]
    private ?string $slugAsso = null;

    #[ORM\Column]
    private ?int $immatriculationAsso = null;

    #[ORM\ManyToMany(targetEntity: Department::class, inversedBy: 'associations')]
    private Collection $department;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionAsso = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'users')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'assos')]
    private Collection $assos;

    #[ORM\ManyToMany(targetEntity: Lodging::class, inversedBy: 'users')]
    private Collection $lodgings;
    private Collection $favoris;

    public function __construct()
    {
        $this->lodgings = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Lodging $lodging):static
    {
            $this->lodgings->add($lodging);

        return $this;  
    }

    public function removeFavori(Lodging $lodging):static
    {

            $this->lodgings->removeElement($lodging);

        return $this;  
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return Collection<int, Lodging>
     */
    public function getLodgings(): Collection
    {
        return $this->lodgings;
    }


    public function setSlugAsso(string $slugAsso): self
    {
        $this->slugAsso = $slugAsso;

        return $this;
    }

    public function getImmatriculationAsso(): ?int
    {
        return $this->immatriculationAsso;
    }

    public function setImmatriculationAsso(int $immatriculationAsso): static
    {
        $this->immatriculationAsso = $immatriculationAsso;

        return $this;
    }

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

//     public function addLodging(Lodging $lodging): self
// {
//     $this->lodgings->add($lodging);

//     return $this;
// }

// public function removeLodging(Lodging $lodging): self
// {
//     $this->lodgings->removeElement($lodging);

//     return $this;
// }
    



