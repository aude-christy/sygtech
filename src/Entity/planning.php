<?php

class Planning 
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="Interventions", mappedBy="Planning")
     */
    private $date_planning;
}
