<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use EntityIndentifierTrait;

class Interventions 
{

    /**
     * @ManyToOne(targetEntity="Agences", mappedBy="Interventions")
     */
    private $Agences;

    /**
     * @Column(type=string, nullable=false)
     */
    private $libelle_intervention;

    /**
    * @Column(type=string)
    */
    private $date_intervention;

    /**
    * @Column(type=date)
    */
    private $type_intervention;

    /**
    * @Column(type=string)
    */
    private $heure_intervention;
    
    /**
    * @Column(type=string)
    */
    private $Planning;

    /**
     * @OneTomany(targetEntity="planning", inversedBy="Interventions")
     */
    private $detail_intervention;

    public function __construct()
    {
        $this->$date_intervention = new \DateTime();
    }

    public function getlibelle_intervention(): ?string
    {
        return $this->libelle_intervention;
    }
    public function setlibelle_intervention(string $libelle_intervention): void
    {
        $this->libelle_intervention = $libelle_intervention;
    }

    public function gettype_intervention(): ?string
    {
        return $this->type_intervention;
    }
    public function settype_intervention(string $type_intervention): void
    {
        $this->type_intervention = $type_intervention;
    }

    public function getheure_intervention(): ?heure_intervention
    {
        return $this->heure_intervention;
    }
    public function setPost(heure_intervention $heure_intervention): void
    {
        $this->heure_intervention = $heure_intervention;
    }

    public function addPlanning
    (Planning $Planning)
    {
        $this->Planning[] = $Planning;
        return $this;

        $em->persist(Planning);
        $em->flush();
    }

    public function getPlanning(): ?Planning
    {
        return $this->Planning;
    }

    public function setPlanning(Planning $Planning): void
    {
        $this->Planning = $Planning;
    }

    

    
}
