<?php

class Rapport extends
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyTomany(targetEntity="Utilisateurs", mappedBy=" Rapport")
     */
    private $utilisateurs;

   $utilisateurs = new ArrayCollection();
   $entitymanager->flush();
   
    private $libellé_rapport;

    /**
    * @Column(type=string)
    */
    private $photo;

}
