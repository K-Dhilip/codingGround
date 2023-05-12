<?php

namespace App\Entity;

use App\Repository\RapportVisiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportVisiteRepository::class)]
class RapportVisite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVisites')]
    private ?particien $particien = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticien(): ?particien
    {
        return $this->particien;
    }

    public function setParticien(?particien $particien): self
    {
        $this->particien = $particien;

        return $this;
    }
}
