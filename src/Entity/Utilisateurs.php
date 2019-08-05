<?php

class Utilisateurs extends
{
    use EntityIndentifierTrait;

    
    /**
     * @ManyTomany(targetEntity="", mappedBy="")
     */
    private $rapport;

    /**
    * @Column(type=string, nullable=true)
    */
    private $nom_user;

    /**
    * @Column(type=string)
    */
    private $id_user;

    /**
    * @Column(type=integer)
    */
    private $login_user;

    /**
    * @Column(type=string)
    */
    private $mdp_user;

    /**
    * @Column(type=string)
    */
    private $adresse_user;

    /**
    * @Column(type=string)
    */

    private $prenom_user;


  
}
