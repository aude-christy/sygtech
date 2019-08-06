<?php

class interventions 
{
    use EntityIndentifierTrait;

    
    /**
     * @OneTomany(targetEntity="Agences", mappedBy="Interventions")
     */
    private $Agences;
    
    public function --construct() 
    {

        $this->$Agences = new ArrayCollection();
    }
    public function addAgences
    (Agences $Agences)
    {

        $this->Agences[] = $Agences;
        return $this;
    }
    public getAgences()
    {

        return $this->Agences;
    }
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

    private $montant_depense;

    /**
    * @Column(type=string)
    */
    private $heure_intervention;
    
    /**
    * @Column(type=string)
    */

    private $detail_intervention;

    
}
