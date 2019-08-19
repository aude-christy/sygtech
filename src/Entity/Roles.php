<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Roles
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="Utilisateurs", inversedBy="Roles")
     * @joincolumn( name="id_Utilisateurs", referencedColumnName= "id" nullable=false)
     */
    private $Utilisateurs;

    /**
    * @Column(type=string, nullable=true)
    */
    private $libelle_fonction;

    public function setlibelle_fonction(string $libelle_fonction): void
    {
        $this->libelle_fonction = $libelle_fonction;
    }
    public function getlibelle_fonction(): ?string
    {
        return $this->libelle_fonction;
    }

    
}
