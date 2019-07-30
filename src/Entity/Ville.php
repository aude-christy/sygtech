<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="villes)
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    use EntityIndentifierTrait;

    /**
    * @Column(type=string, nullable=true)
    */
    private $nom_ville;
}
