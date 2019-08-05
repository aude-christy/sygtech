<?php

abstract class Utilisateurs 
{
    use EntityIndentifierTrait;

    protected $id;

    /**
     * @OneTomany(targetEntity="GDH", mappedBy=" utilisateurs")
     * @joincolumn( nullable= false)
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

    private $prenom_user;


  
}
