<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="Planning)
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Planning 
{
    use EntityIndentifierTrait;

    /**
     * @Column(type=Date, nullable=true)
     */
    private $date_planning;
}