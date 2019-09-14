<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionsRepository")
 */
class Interventions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name = "id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name = "libelle_intervention", type="string", length=255)
     */
    private $libelle_intervention;

    /**
     * @ORM\Column(name = "datedebut", type="string", length=255)
     */
    private $date_debut;

    /**
     * @ORM\Column(name = "etat", type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Planning", inversedBy="interventions")
     * * @ORM\JoinColumn(name = "planning", nullable=true)
     */
    private $planning;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DateFin", inversedBy="interventions")
     * * @ORM\JoinColumn(name = "datefin", nullable=true)
     */
    private $datefin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DemandeIntervention", mappedBy="intervention")
     * * @ORM\JoinColumn(nullable=true)
     */
    private $demandeInterventions;

    public function __construct()
    {
        $this->demandeInterventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleIntervention(): ?string
    {
        return $this->libelle_intervention;
    }

    public function setLibelleIntervention(string $libelle_intervention): self
    {
        $this->libelle_intervention = $libelle_intervention;

        return $this;
    }

    //public function getLieuIntervention(): ?string
    //{
     //   return $this->lieu_intervention;
    //}

   // public function setLieuIntervention(string $lieu_intervention): self
   // {
       // $this->lieu_intervention = $lieu_intervention;

       // return $this;
    //}

    public function getDateDebut()
    {
        return $this->date_debut;
    }

    public function setDateDebut(string $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getEstFaite(): ?Planning
    {
        return $this->est_faite;
    }

    public function setEstFaite(?Planning $est_faite): self
    {
        $this->est_faite = $est_faite;

        return $this;
    }

    public function getAvoir(): ?DateFin
    {
        return $this->avoir;
    }

    public function setAvoir(?DateFin $avoir): self
    {
        $this->avoir = $avoir;

        return $this;
    }

    /**
     * @return Collection|DemandeIntervention[]
     */
    public function getDemandeInterventions(): Collection
    {
        return $this->demandeInterventions;
    }

    public function addDemandeIntervention(DemandeIntervention $demandeIntervention): self
    {
        if (!$this->demandeInterventions->contains($demandeIntervention)) {
            $this->demandeInterventions[] = $demandeIntervention;
            $demandeIntervention->addIntervention($this);
        }

        return $this;
    }

    public function removeDemandeIntervention(DemandeIntervention $demandeIntervention): self
    {
        if ($this->demandeInterventions->contains($demandeIntervention)) {
            $this->demandeInterventions->removeElement($demandeIntervention);
            $demandeIntervention->removeIntervention($this);
        }

        return $this;
    }
    
}
