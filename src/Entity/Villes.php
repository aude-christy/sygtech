<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VillesRepository")
 */
class Villes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nom_ville", type="string", length=255)
     */
    private $nom_ville;

    /**
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(name="lattitude", type="float")
     */
    private $lattitude;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Agences", mappedBy="villes")
     */
    private $se_trouve;

    public function __construct()
    {
        $this->se_trouve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->nom_ville;
    }

    public function setNomVille(string $nom_ville): self
    {
        $this->nom_ville = $nom_ville;

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
     * @return Collection|Agences[]
     */
    public function getSeTrouve(): Collection
    {
        return $this->se_trouve;
    }

    public function addSeTrouve(Agences $seTrouve): self
    {
        if (!$this->se_trouve->contains($seTrouve)) {
            $this->se_trouve[] = $seTrouve;
            $seTrouve->setVilles($this);
        }

        return $this;
    }

    public function removeSeTrouve(Agences $seTrouve): self
    {
        if ($this->se_trouve->contains($seTrouve)) {
            $this->se_trouve->removeElement($seTrouve);
            // set the owning side to null (unless already changed)
            if ($seTrouve->getVilles() === $this) {
                $seTrouve->setVilles(null);
            }
        }

        return $this;
    }

    public function __tostring()
    {
        return $this->nom_ville;
    }

    
    public function setUp() {
    	$this->hasMany(
    		'Agences as agences', 
    		array(
    			'local' => 'id', 
    			'foreign' => 'id_agences'
    		)
    	);
    }
}
