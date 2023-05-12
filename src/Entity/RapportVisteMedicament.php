<?php

namespace App\Entity;

use App\Repository\RapportVisteMedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportVisteMedicamentRepository::class)]
class RapportVisteMedicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: medicament::class)]
    private Collection $medicament;

    public function __construct()
    {
        $this->medicament = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, medicament>
     */
    public function getMedicament(): Collection
    {
        return $this->medicament;
    }

    public function addMedicament(medicament $medicament): self
    {
        if (!$this->medicament->contains($medicament)) {
            $this->medicament->add($medicament);
        }

        return $this;
    }

    public function removeMedicament(medicament $medicament): self
    {
        $this->medicament->removeElement($medicament);

        return $this;
    }
}
