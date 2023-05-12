<?php

namespace App\Entity;

use App\Repository\ParticienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticienRepository::class)]
class Particien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    #[ORM\Column(length: 40)]
    private ?string $preNom = null;

    #[ORM\Column(length: 50)]
    private ?string $addresse = null;

    #[ORM\OneToMany(mappedBy: 'particien', targetEntity: RapportVisite::class)]
    private Collection $rapportVisites;

    #[ORM\OneToMany(mappedBy: 'particien', targetEntity: RapportViste::class)]
    private Collection $rapportVistes;

    public function __construct()
    {
        $this->rapportVisites = new ArrayCollection();
        $this->rapportVistes = new ArrayCollection();
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

    public function getPreNom(): ?string
    {
        return $this->preNom;
    }

    public function setPreNom(string $preNom): self
    {
        $this->preNom = $preNom;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    /**
     * @return Collection<int, RapportVisite>
     */
    public function getRapportVisites(): Collection
    {
        return $this->rapportVisites;
    }

    public function addRapportVisite(RapportVisite $rapportVisite): self
    {
        if (!$this->rapportVisites->contains($rapportVisite)) {
            $this->rapportVisites->add($rapportVisite);
            $rapportVisite->setParticien($this);
        }

        return $this;
    }

    public function removeRapportVisite(RapportVisite $rapportVisite): self
    {
        if ($this->rapportVisites->removeElement($rapportVisite)) {
            // set the owning side to null (unless already changed)
            if ($rapportVisite->getParticien() === $this) {
                $rapportVisite->setParticien(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RapportViste>
     */
    public function getRapportVistes(): Collection
    {
        return $this->rapportVistes;
    }

    public function addRapportViste(RapportViste $rapportViste): self
    {
        if (!$this->rapportVistes->contains($rapportViste)) {
            $this->rapportVistes->add($rapportViste);
            $rapportViste->setParticien($this);
        }

        return $this;
    }

    public function removeRapportViste(RapportViste $rapportViste): self
    {
        if ($this->rapportVistes->removeElement($rapportViste)) {
            // set the owning side to null (unless already changed)
            if ($rapportViste->getParticien() === $this) {
                $rapportViste->setParticien(null);
            }
        }

        return $this;
    }
}
