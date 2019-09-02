<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipementsRepository")
 */
class Equipements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_unitaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantité;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RapportsIntervention", mappedBy="admettre")
     */
    private $rapportsInterventions;

    public function __construct()
    {
        $this->rapportsInterventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixUnitaire(): ?int
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(int $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getQuantité(): ?int
    {
        return $this->quantité;
    }

    public function setQuantité(int $quantité): self
    {
        $this->quantité = $quantité;

        return $this;
    }

    /**
     * @return Collection|RapportsIntervention[]
     */
    public function getRapportsInterventions(): Collection
    {
        return $this->rapportsInterventions;
    }

    public function addRapportsIntervention(RapportsIntervention $rapportsIntervention): self
    {
        if (!$this->rapportsInterventions->contains($rapportsIntervention)) {
            $this->rapportsInterventions[] = $rapportsIntervention;
            $rapportsIntervention->addAdmettre($this);
        }

        return $this;
    }

    public function removeRapportsIntervention(RapportsIntervention $rapportsIntervention): self
    {
        if ($this->rapportsInterventions->contains($rapportsIntervention)) {
            $this->rapportsInterventions->removeElement($rapportsIntervention);
            $rapportsIntervention->removeAdmettre($this);
        }

        return $this;
    }
}
