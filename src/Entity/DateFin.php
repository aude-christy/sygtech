<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DateFinRepository")
 */
class DateFin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Interventions", mappedBy="avoir")
     */
    private $interventions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RapportsIntervention", mappedBy="datefin")
     */
    private $rapportsInterventions;

    public function __construct()
    {
        $this->interventions = new ArrayCollection();
        $this->rapportsInterventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Interventions[]
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Interventions $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setAvoir($this);
        }

        return $this;
    }

    public function removeIntervention(Interventions $intervention): self
    {
        if ($this->interventions->contains($intervention)) {
            $this->interventions->removeElement($intervention);
            // set the owning side to null (unless already changed)
            if ($intervention->getAvoir() === $this) {
                $intervention->setAvoir(null);
            }
        }

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
            $rapportsIntervention->setDatefin($this);
        }

        return $this;
    }

    public function removeRapportsIntervention(RapportsIntervention $rapportsIntervention): self
    {
        if ($this->rapportsInterventions->contains($rapportsIntervention)) {
            $this->rapportsInterventions->removeElement($rapportsIntervention);
            // set the owning side to null (unless already changed)
            if ($rapportsIntervention->getDatefin() === $this) {
                $rapportsIntervention->setDatefin(null);
            }
        }

        return $this;
    }
}
