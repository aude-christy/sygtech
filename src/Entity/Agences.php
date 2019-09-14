<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgencesRepository")
 */
class Agences
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nom_agence", type="string", length=255)
     */
    private $nom_agence;

    /**
     * @ORM\Column(name="heure_ouverture",type="string", length=255, nullable=false)
     */
    private $heure_ouverture;

    /**
     * @ORM\Column(name="heure_fermeture", type="string", length=255, nullable=false)
     */
    private $heure_fermeture;

    /**
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(name="lattitude", type="float")
     */
    private $lattitude;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DemandeIntervention", mappedBy="demander")
     */
    private $demandeInterventions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Villes", inversedBy="se_trouve")
     */
    private $villes;

    public function __construct()
    {
        $this->demandeInterventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAgence(): ?string
    {
        return $this->nom_agence;
    }

    public function setNomAgence(string $nom_agence): self
    {
        $this->nom_agence = $nom_agence;

        return $this;
    }

    public function getHeureOuverture() 
    {
        return $this->heure_ouverture;
    }

    public function setHeureOuverture(string $heure_ouverture): self
    {
        $this->heure_ouverture = $heure_ouverture;

        return $this;
    }

    public function getHeureFermeture()
    {
        return $this->heure_fermeture;
    }

    public function setHeureFermeture(string $heure_fermeture): self
    {
        $this->heure_fermeture = $heure_fermeture;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLattitude(): ?float
    {
        return $this->lattitude;
    }

    public function setLattitude(float $lattitude): self
    {
        $this->lattitude = $lattitude;

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
            $demandeIntervention->addDemander($this);
        }

        return $this;
    }

    public function removeDemandeIntervention(DemandeIntervention $demandeIntervention): self
    {
        if ($this->demandeInterventions->contains($demandeIntervention)) {
            $this->demandeInterventions->removeElement($demandeIntervention);
            $demandeIntervention->removeDemander($this);
        }

        return $this;
    }

    public function getVilles(): ?Villes
    {
        return $this->villes;
    }

    public function setVilles(?Villes $villes): self
    {
        $this->villes = $villes;

        return $this;
    }
    public function __tostring()
    {
        return $this->nom_agence;
    }

    public function setUp() {
    	$this->hasOne(
    		'Villes as villes', 
    		array(
    			'local' => 'id', 
    			'foreign' => 'id_villes'
    		)
    	);
    }
}
