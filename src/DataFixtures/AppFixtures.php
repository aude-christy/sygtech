<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Agences ;
use App\Entity\DateFin ;
use App\Entity\DemandeIntervention ;
use App\Entity\Equipements ;
use App\Entity\Interventions ;
use App\Entity\Planning ;
use App\Entity\Profil ;
use App\Entity\RapportsIntervention ;
use App\Entity\Role ;
use App\Entity\Villes ;
use Doctrine\Bundle\FixturesBundle\Fixture ;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;


class AppFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
      $faker = \Faker\Factory::create('fr_FR');
        //for($i = 1; $i <= 10; $i++){
           // $agence = new agences();
            //$agence->setnom_agence("nom de l'agence n°$i")
              //      ->setheure_ouverture(new \Time())
                //    ->setheure_fermeture(new \Time())
                  //  ->setlongitude("longitude de l'agence est 76°")
                    //->setlattitude("lattitude de l'agence est 39°");
           // $manager->persist($agence);
      //  }
      
      for($i = 1; $i <= 10; $i++){
      $agences = new Agences();
      $agences->setNomagence($faker->name);
      $agences->setHeureouverture($faker->dateTimeBetween
      ($minimum));
      $agences->setHeurefermeture($faker->dateTimeBetween
      ($minimum));
      $agences->setLongitude($faker->longitude($min = -180, $max = 180));
      $agences->setLattitude($faker->latitude($min = -90, $max = 90));
      
      $manager->persist($agences);
      }

      for($k = 1; $k <= 10; $k++){
        $datefin = new DateFin();
        $datefin->setDate($faker->dateTimeBetween
        ($minimum));

        $manager->persist($datefin);
        }

      for($m = 1; $m <= 10; $m++){
          $demandeintervention = new DemandeIntervention();
          $demandeintervention->setDescriptionproblème($faker->paragraph());
          $demandeintervention->setDateprevu($faker->dateTimeBetween
          ($minimum));
          
          $manager->persist($demandeintervention);
          }

        
      for($n = 1; $n <= 10; $n++){
        $equipements = new Equipements();
        $equipements->setPrixunitaire($faker->randomNumber(2));
        $equipements->setType($type);
        $equipements->setDesignation($faker->paragraph());
        $equipements->setQuantite($faker->numberBetween(10,20));
        
        
        $manager->persist($equipements);
      }

      for($l = 1; $l <= 10; $l++){
          $interventions = new Interventions();
          $interventions->setLibelleintervention($faker->sentence());
          $interventions->setLieuintervention($faker->city);
          $interventions->setDatedebut($faker->dateTimeBetween
          ($minimum));
          $interventions->setEtat($etat);
          
          
          $manager->persist($interventions);
      }

      for($j = 1; $j <= 10; $j++){
            $planning = new Planning();
            $planning->setDate($faker->dateTimeBetween
            ($minimum));
            
            
            $manager->persist($planning);
      }

      for($h = 1; $h <= 10; $h++){
              $profil = new Profil();
              $profil->setNom($faker->firstname);
              $profil->setPrenom($faker->lastname);
              $profil->setAdresse($faker->address);
              $profil->setTel($faker->mobileNumber);
              
              
              $manager->persist($profil);
      }

      for($f = 1; $f <= 10; $f++){
        $rapportsintervention = new RapportsIntervention();
        $rapportsintervention->setLibllerapport($faker->sentence());
        $rapportsintervention->setPhoto($faker->imageUrl());
        $irapportsintervention->setPiecejointe($piecejointe);
        $rapportsintervention->setDatefin($faker->dateTimeBetween
        ($minimum));
        
        
        $manager->persist($rapportsintervention);
        }

        for($g = 1; $g <= 10; $g++){
          $role = new Role();
          $role->setLibellerole($faker->sentence());
          
          
          $manager->persist($role);
          }

          for($u = 1; $u <= 10; $u++){
            $villes = new Villes();
            $villes->setNomville($faker->town);
            $villes->setLongitude($faker->longitude($min = -180, $max = 180));
            $villes->setLattitude($faker->latitude($min = -90, $max = 90));
            
            
            
            $manager->persist($villes);
            }
        $manager->flush();
    }

  /**
  * Get the nom_agence of this fixture
  * @return string
  */

  public function setNomAgence(string $nom_agence): self
    {
        $this->nom_agence = $nom_agence;

        return $this;
    }

    
}
