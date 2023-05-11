<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    // #[ORM\ManyToOne(inversedBy: 'Region')]
    // private ?Employe $employe = null;

    // #[ORM\OneToMany(mappedBy: 'region', targetEntity: Employe::class)]
    // private Collection $employes;

    // #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'region')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?self $region = null;

    // #[ORM\ManyToOne(inversedBy: 'region')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?Visiteur $visiteur = null;

    #[ORM\ManyToMany(targetEntity: Visiteur::class, mappedBy: 'regions')]
    private Collection $visiteurs;

    public function __construct()
    {
    //     //$this->employes = new ArrayCollection();
         $this->visiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->setRegion($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getRegion() === $this) {
                $employe->setRegion(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?self
    {
        return $this->region;
    }

    public function setRegion(?self $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getVisiteur(): ?Visiteur
    {
        return $this->visiteur;
    }

    public function setVisiteur(?Visiteur $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * @return Collection<int, Visiteur>
     */
    public function getVisiteurs(): Collection
    {
        return $this->visiteurs;
    }

    public function addVisiteur(Visiteur $visiteur): self
    {
        if (!$this->visiteurs->contains($visiteur)) {
            $this->visiteurs->add($visiteur);
            $visiteur->addRegion($this);
        }

        return $this;
    }

    public function removeVisiteur(Visiteur $visiteur): self
    {
        if ($this->visiteurs->removeElement($visiteur)) {
            $visiteur->removeRegion($this);
        }

        return $this;
    }
}
