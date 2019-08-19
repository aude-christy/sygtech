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
    private $libellé_intervention;

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
    private $detail_intervention;

    /**
    * @Column(type=string)
    */
    private $Agences=[];
    
    public function --construct()
    {

        $this->$Agences = new ArrayCollection();
    }

    public function addAgences
    (Agences $Agences)
    {

        $this->Agences[] = $Agences;
        return $this;

        $em->persist(Agences);
        $em->flush();
    }

    public getAgences()
    {

        return $this->Agences;
    }

    

    
}
