<?php

namespace App\Entity;

use App\Repository\GroupeCursusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Cursus;

#[ORM\Entity(repositoryClass: GroupeCursusRepository::class)]
class GroupeCursus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numGroupeCursus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebutGroupeCursus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinGroupeCursus = null;

    #[ORM\ManyToOne]
    private ?Cursus $cursus_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumGroupeCursus(): ?string
    {
        return $this->numGroupeCursus;
    }

    public function setNumGroupeCursus(?string $numGroupeCursus): self
    {
        $this->numGroupeCursus = $numGroupeCursus;

        return $this;
    }

    public function getDateDebutGroupeCursus(): ?\DateTimeInterface
    {
        return $this->dateDebutGroupeCursus;
    }

    public function setDateDebutGroupeCursus(?\DateTimeInterface $dateDebutGroupeCursus): self
    {
        $this->dateDebutGroupeCursus = $dateDebutGroupeCursus;

        return $this;
    }

    public function getDateFinGroupeCursus(): ?\DateTimeInterface
    {
        return $this->dateFinGroupeCursus;
    }

    public function setDateFinGroupeCursus(?\DateTimeInterface $dateFinGroupeCursus): self
    {
        $this->dateFinGroupeCursus = $dateFinGroupeCursus;

        return $this;
    }

    public function getCursusId(): ?Cursus
    {
        return $this->cursus_id;
    }

    public function setCursusId(?Cursus $cursus_id): self
    {
        $this->cursus_id = $cursus_id;

        return $this;
    }
}
