<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RapportsInterventionRepository")
 */
class RapportsIntervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle_rapport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $piece_jointe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DateFin", inversedBy="rapportsInterventions")
     */
    private $datefin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipements", inversedBy="rapportsInterventions")
     */
    private $admettre;

    public function __construct()
    {
        $this->admettre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleRapport(): ?string
    {
        return $this->libelle_rapport;
    }

    public function setLibelleRapport(string $libelle_rapport): self
    {
        $this->libelle_rapport = $libelle_rapport;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPieceJointe(): ?string
    {
        return $this->piece_jointe;
    }

    public function setPieceJointe(string $piece_jointe): self
    {
        $this->piece_jointe = $piece_jointe;

        return $this;
    }

    public function getDatefin(): ?DateFin
    {
        return $this->datefin;
    }

    public function setDatefin(?DateFin $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * @return Collection|Equipements[]
     */
    public function getAdmettre(): Collection
    {
        return $this->admettre;
    }

    public function addAdmettre(Equipements $admettre): self
    {
        if (!$this->admettre->contains($admettre)) {
            $this->admettre[] = $admettre;
        }

        return $this;
    }

    public function removeAdmettre(Equipements $admettre): self
    {
        if ($this->admettre->contains($admettre)) {
            $this->admettre->removeElement($admettre);
        }

        return $this;
    }
}
