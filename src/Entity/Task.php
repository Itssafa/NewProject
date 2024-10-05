<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titret = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descr = null;

    #[ORM\Column]
    private ?\DateInterval $durée = null;

    #[ORM\Column(length: 255)]
    private ?string $état = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activity $activité = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $developpeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitret(): ?string
    {
        return $this->titret;
    }

    public function setTitret(string $titret): static
    {
        $this->titret = $titret;

        return $this;
    }

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(?string $descr): static
    {
        $this->descr = $descr;

        return $this;
    }

    public function getDurée(): ?\DateInterval
    {
        return $this->durée;
    }

    public function setDurée(\DateInterval $durée): static
    {
        $this->durée = $durée;

        return $this;
    }

    public function getétat(): ?string
    {
        return $this->état;
    }

    public function setétat(string $état): static
    {
        $this->état = $état;

        return $this;
    }

    public function getActivité(): ?Activity
    {
        return $this->activité;
    }

    public function setActivité(?Activity $activité): static
    {
        $this->activité = $activité;

        return $this;
    }

    public function getDeveloppeur(): ?User
    {
        return $this->developpeur;
    }

    public function setDeveloppeur(?User $developpeur): static
    {
        $this->developpeur = $developpeur;

        return $this;
    }
}
