<?php

namespace App\Entity;

use App\Repository\CursusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursusRepository::class)]
class Cursus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column(nullable: true)]
    private ?bool $typeCursus = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $prixCursus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionCursus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function isTypeCursus(): ?bool
    {
        return $this->typeCursus;
    }

    public function setTypeCursus(?bool $typeCursus): self
    {
        $this->typeCursus = $typeCursus;

        return $this;
    }

    public function getPrixCursus(): ?string
    {
        return $this->prixCursus;
    }

    public function setPrixCursus(?string $prixCursus): self
    {
        $this->prixCursus = $prixCursus;

        return $this;
    }

    public function getDescriptionCursus(): ?string
    {
        return $this->descriptionCursus;
    }

    public function setDescriptionCursus(?string $descriptionCursus): self
    {
        $this->descriptionCursus = $descriptionCursus;

        return $this;
    }
}
