<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?badge $badge = null;

    #[ORM\OneToMany(mappedBy: 'employe', targetEntity: Region::class)]
    private Collection $Region;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    private ?region $region = null;

    public function __construct()
    {
        $this->Region = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBadge(): ?badge
    {
        return $this->badge;
    }

    public function setBadge(?badge $badge): self
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return Collection<int, Region>
     */
    public function getRegion(): Collection
    {
        return $this->Region;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->Region->contains($region)) {
            $this->Region->add($region);
            $region->setEmploye($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->Region->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getEmploye() === $this) {
                $region->setEmploye(null);
            }
        }

        return $this;
    }

    public function setRegion(?region $region): self
    {
        $this->region = $region;

        return $this;
    }

    
}
