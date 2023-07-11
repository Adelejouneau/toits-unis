<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cuisineCouvert = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cusineMicroOnde = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cuisinePlaqueCuisson = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sanitaireToilette = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sanitaireLavabo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sanitaireDouche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couchageLit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couchageCanape = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couchageAutre = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrDeLit = null;

    #[ORM\ManyToMany(targetEntity: Lodging::class, inversedBy: 'equipements')]
    private Collection $lodging;

    public function __construct()
    {
        $this->lodging = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCuisineCouvert(): ?string
    {
        return $this->cuisineCouvert;
    }

    public function setCuisineCouvert(?string $cuisineCouvert): static
    {
        $this->cuisineCouvert = $cuisineCouvert;

        return $this;
    }

    public function getCusineMicroOnde(): ?string
    {
        return $this->cusineMicroOnde;
    }

    public function setCusineMicroOnde(?string $cusineMicroOnde): static
    {
        $this->cusineMicroOnde = $cusineMicroOnde;

        return $this;
    }

    public function getCuisinePlaqueCuisson(): ?string
    {
        return $this->cuisinePlaqueCuisson;
    }

    public function setCuisinePlaqueCuisson(?string $cuisinePlaqueCuisson): static
    {
        $this->cuisinePlaqueCuisson = $cuisinePlaqueCuisson;

        return $this;
    }

    public function getSanitaireToilette(): ?string
    {
        return $this->sanitaireToilette;
    }

    public function setSanitaireToilette(?string $sanitaireToilette): static
    {
        $this->sanitaireToilette = $sanitaireToilette;

        return $this;
    }

    public function getSanitaireLavabo(): ?string
    {
        return $this->sanitaireLavabo;
    }

    public function setSanitaireLavabo(?string $sanitaireLavabo): static
    {
        $this->sanitaireLavabo = $sanitaireLavabo;

        return $this;
    }

    public function getSanitaireDouche(): ?string
    {
        return $this->sanitaireDouche;
    }

    public function setSanitaireDouche(?string $sanitaireDouche): static
    {
        $this->sanitaireDouche = $sanitaireDouche;

        return $this;
    }

    public function getCouchageLit(): ?string
    {
        return $this->couchageLit;
    }

    public function setCouchageLit(?string $couchageLit): static
    {
        $this->couchageLit = $couchageLit;

        return $this;
    }

    public function getCouchageCanape(): ?string
    {
        return $this->couchageCanape;
    }

    public function setCouchageCanape(?string $couchageCanape): static
    {
        $this->couchageCanape = $couchageCanape;

        return $this;
    }

    public function getCouchageAutre(): ?string
    {
        return $this->couchageAutre;
    }

    public function setCouchageAutre(?string $couchageAutre): static
    {
        $this->couchageAutre = $couchageAutre;

        return $this;
    }

    public function getNbrDeLit(): ?int
    {
        return $this->nbrDeLit;
    }

    public function setNbrDeLit(?int $nbrDeLit): static
    {
        $this->nbrDeLit = $nbrDeLit;

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
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): static
    {
        $this->lodging->removeElement($lodging);

        return $this;
    }
}
