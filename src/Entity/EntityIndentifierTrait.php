<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

trait EntityIndentifierTrait
{
    /**
     * The unique auto incremented primary key.
     *
     * @var int|null
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * The internal primary identity key.
     *
     * @var UuidInterface
     *
     * @ORM\Column(type="uuid", unique=true)
     * 
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $uuid;

    /**
    * Retourner la valeur auto incrementer de la table.
    *
    * @return 
    */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
    * Retourner le uuid de la table.
    *
    * @return 
    */
    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }
}
