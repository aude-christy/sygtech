<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use EntityIndentifierTrait;

 class Utilisateurs 
{

     /**
     * @OneTomany(targetEntity="Roles", mappedBy="Utilisateurs")
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

    /**
    * @Column(type=string)
    */
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setlogin_user(string $login_user): void
    {
        $this->login_user = $login_user;
    }
    public function getlogin_user(): ?string
    {
        return $this->login_user;
    }
    
    public function getmdp_user(): ?string
    {
        return $this->mdp_user;
    }
    public function setmdp_user(string $mdp_user): void
    {
        $this->mdp_user = $mdp_user;
    }

    public function getprenom_user(): ?string
    {
        return $this->prenom_user;
    }
    public function setprenom_user(string $prenom_user): void
    {
        $this->prenom_user = $prenom_user;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
    
    
}
