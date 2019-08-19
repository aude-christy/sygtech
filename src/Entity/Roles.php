<?php

class Roles
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="Utilisateurs", inversedBy="Roles")
     * @joincolumn( name="id_Utilisateurs", referencedColumnName= "id" nullable=false)
     */
    private $Utilisateurs;

    public function 
    setUtilisateurs(Utilisateurs $Utilisateurs)
    {

        $this->$Utilisateurs = $Utilisateurs;
    }
    public function getUtilisateurs(){
        return $this->Utilisateurs;
    }

    $entitymanager->flush();
    
    private $libelle_fonction;

}
