<?php

namespace App\Entity;

use App\Repository\RapportVisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportVisteRepository::class)]
class RapportViste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Bilan = null;

    #[ORM\Column(length: 10)]
    private ?string $date_visite = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVistes')]
    private ?particien $particien = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBilan(): ?string
    {
        return $this->Bilan;
    }

    public function setBilan(string $Bilan): self
    {
        $this->Bilan = $Bilan;

        return $this;
    }

    public function getDateVisite(): ?string
    {
        return $this->date_visite;
    }

    public function setDateVisite(string $date_visite): self
    {
        $this->date_visite = $date_visite;

        return $this;
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
