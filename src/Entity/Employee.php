<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Emp_depart = null;

    #[ORM\Column(length: 255)]
    private ?string $Emp_nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpDepart(): ?string
    {
        return $this->Emp_depart;
    }

    public function setEmpDepart(string $Emp_depart): self
    {
        $this->Emp_depart = $Emp_depart;

        return $this;
    }

    public function getEmpNom(): ?string
    {
        return $this->Emp_nom;
    }

    public function setEmpNom(string $Emp_nom): self
    {
        $this->Emp_nom = $Emp_nom;

        return $this;
    }
}
