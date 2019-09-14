<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeInterventionRepository")
 */
class DemandeIntervention
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
    private $date_prevu;

    /**
     * @ORM\Column(type="text")
     */
    private $description_probleme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Interventions", inversedBy="demandeInterventions")
     */
    private $intervention;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Agences", inversedBy="demandeInterventions")
     */
    private $demander;

    public function __construct()
    {
        $this->intervention = new ArrayCollection();
        $this->demander = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePrevu(): ?\DateTimeInterface
    {
        return $this->date_prevu;
    }

    public function setDatePrevu(string $date_prevu): self
    {
        $this->date_prevu = $date_prevu;

        return $this;
    }

    public function getDescriptionProbleme(): ?string
    {
       return $this->description_probleme;
    }

    public function setDescriptionProbleme(string $description_probleme): self
    {
        $this->description_probleme = $description_probleme;

        return $this;
    }

    /**
     * @return Collection|Interventions[]
     */
    public function getIntervention(): Collection
    {
        return $this->intervention;
    }

    public function addIntervention(Interventions $intervention): self
    {
        if (!$this->intervention->contains($intervention)) {
            $this->intervention[] = $intervention;
        }

        return $this;
    }

    public function removeIntervention(Interventions $intervention): self
    {
        if ($this->intervention->contains($intervention)) {
            $this->intervention->removeElement($intervention);
        }

        return $this;
    }

    /**
     * @return Collection|Agences[]
     */
    public function getDemander(): Collection
    {
        return $this->demander;
    }

    public function addDemander(Agences $demander): self
    {
        if (!$this->demander->contains($demander)) {
            $this->demander[] = $demander;
        }

        return $this;
    }

    public function removeDemander(Agences $demander): self
    {
        if ($this->demander->contains($demander)) {
            $this->demander->removeElement($demander);
        }

        return $this;
    }

    
}
