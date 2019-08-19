<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Rapport
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyTomany(targetEntity="Utilisateurs", mappedBy=" Rapport")
     */
    private $utilisateurs;

    private $libelle_rapport;

    /**
    * @Column(type=string)
    */
    private $photo;

    public function setlibelle_rapport(string $libelle_rapport): void
    {
        $this->libelle_rapport = $libelle_rapport;
    }
    public function getlibelle_rapport(): ?string
    {
        return $this->libelle_rapport;
    }

    public function setphoto(string $photo): void
    {
        $this->photo = $photo;
    }
    public function getphoto(): ?string
    {
        return $this->photo;
    }


}
