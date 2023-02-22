<?php

namespace App\Entity;

use App\Repository\EmailAdresseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmailAdresseRepository::class)]
class EmailAdresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailAdresse = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEnreg = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\Column]
    private ?bool $Status = null;

    #[ORM\ManyToOne(inversedBy: 'emailAdresses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personne $Personne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailAdresse(): ?string
    {
        return $this->EmailAdresse;
    }

    public function setEmailAdresse(string $EmailAdresse): self
    {
        $this->EmailAdresse = $EmailAdresse;

        return $this;
    }

    public function getDateEnreg(): ?\DateTimeInterface
    {
        return $this->DateEnreg;
    }

    public function setDateEnreg(\DateTimeInterface $DateEnreg): self
    {
        $this->DateEnreg = $DateEnreg;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->Status;
    }

    public function setStatus(bool $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->Personne;
    }

    public function setPersonne(?Personne $Personne): self
    {
        $this->Personne = $Personne;

        return $this;
    }
}
