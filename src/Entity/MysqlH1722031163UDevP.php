<?php

namespace App\Entity;

use App\Repository\MysqlH1722031163UDevPRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MysqlH1722031163UDevPRepository::class)]
class MysqlH1722031163UDevP
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
