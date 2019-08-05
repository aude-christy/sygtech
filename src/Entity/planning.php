<?php
class planning extends
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="", mappedBy="")
     * @OneTomany(targetEntity="", mappedBy="")
     */
    private $utilisateurs & $interventions;

    /**
    * @Column(type=string, nullable=true)
    */
    
    private $date_planning;
}
