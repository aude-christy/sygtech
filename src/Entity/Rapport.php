<?php

class rapport extends
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyTomany(targetEntity="", mappedBy="")
     */
    private $utilisateurs;

    /**
    * @Column(type=string, nullable=true)
    */
    
    private $libellé_rapport;

    /**
    * @Column(type=string)
    */
    private $photo;

}
