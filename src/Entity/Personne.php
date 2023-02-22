<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateNaissance = null;

    #[ORM\Column]
    private ?bool $Sexe = null;

    #[ORM\Column(length: 50)]
    private ?string $Identifiant = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $NSS = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypePersonne $Type = null;

    #[ORM\OneToMany(mappedBy: 'Personne', targetEntity: Adresse::class)]
    private Collection $adresses;

    #[ORM\OneToMany(mappedBy: 'Personne', targetEntity: EmailAdresse::class)]
    private Collection $emailAdresses;

    #[ORM\OneToMany(mappedBy: 'Personne', targetEntity: Telephone::class)]
    private Collection $telephones;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
        $this->emailAdresses = new ArrayCollection();
        $this->telephones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function isSexe(): ?bool
    {
        return $this->Sexe;
    }

    public function setSexe(bool $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->Identifiant;
    }

    public function setIdentifiant(string $Identifiant): self
    {
        $this->Identifiant = $Identifiant;

        return $this;
    }

    public function getNSS(): ?int
    {
        return $this->NSS;
    }

    public function setNSS(?int $NSS): self
    {
        $this->NSS = $NSS;

        return $this;
    }

    public function getType(): ?TypePersonne
    {
        return $this->Type;
    }

    public function setType(TypePersonne $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresse $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses->add($adress);
            $adress->setPersonne($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): self
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getPersonne() === $this) {
                $adress->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmailAdresse>
     */
    public function getEmailAdresses(): Collection
    {
        return $this->emailAdresses;
    }

    public function addEmailAdress(EmailAdresse $emailAdress): self
    {
        if (!$this->emailAdresses->contains($emailAdress)) {
            $this->emailAdresses->add($emailAdress);
            $emailAdress->setPersonne($this);
        }

        return $this;
    }

    public function removeEmailAdress(EmailAdresse $emailAdress): self
    {
        if ($this->emailAdresses->removeElement($emailAdress)) {
            // set the owning side to null (unless already changed)
            if ($emailAdress->getPersonne() === $this) {
                $emailAdress->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Telephone>
     */
    public function getTelephones(): Collection
    {
        return $this->telephones;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->telephones->contains($telephone)) {
            $this->telephones->add($telephone);
            $telephone->setPersonne($this);
        }

        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        if ($this->telephones->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getPersonne() === $this) {
                $telephone->setPersonne(null);
            }
        }

        return $this;
    }
}
