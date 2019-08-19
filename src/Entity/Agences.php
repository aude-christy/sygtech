<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="agences)
 * @ORM\Entity(repositoryClass="App\Repository\AgencesRepository")
 */
class Agences 
{
    use EntityIndentifierTrait;

    
    /**
     * @ManyToOne(targetEntity="", mappedBy="")
     */
    private $villes;

    /**
    * @Column(type=string, nullable=true)
    */
    private $nom_agence;

    /**
    * @Column(type=string)
    */
    private $heure_ouverture;

    /**
    * @Column(type=string)
    */
    private $heure_fermeture;

    /**
    * @Column(type=string)
    */
    private $longitude;

    /**
    * @Column(type=string)
    */
    private $latitude;

    public function __construct(Type $var = null)
    {
        
    }





}
