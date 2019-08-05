<?php

class interventions extends
{
    use EntityIndentifierTrait;

    
    /**
     * @OneTomany(targetEntity="", mappedBy="")
     */
    private $agence;

    /**
    * @Column(type=string, nullable=true)
    */
    private $libellé_intervention;

    /**
    * @Column(type=string)
    */
    private $id_intervention;

    /**
    * @Column(type=integer)
    */
    private $lieu_intervention;

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
