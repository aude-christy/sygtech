<?php

class fonction extends
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="", mappedBy="")
     */
    private $utilisateurs;

    /**
    * @Column(type=string, nullable=true)
    */
    
    private $libellé_fonction;

    /**
    * @Column(type=string)
    */
    private $id_fonction;

}
