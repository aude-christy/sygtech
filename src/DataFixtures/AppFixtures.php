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
      $agences->setHeureouverture($faker->time($format = 'H:i:s', $max = 'now')
      );
      $agences->setHeurefermeture($faker->time($format = 'H:i:s', $max = 'now')
      );
      $agences->setLongitude($faker->longitude($min = -180, $max = 180));
      $agences->setLattitude($faker->latitude($min = -90, $max = 90));
      
      $manager->persist($agences);
      }

      for($k = 1; $k <= 10; $k++){
        $datefin = new DateFin();
        $datefin->setDate($faker->date($format = 'Y-m-d', $max = 'now'));

        $manager->persist($datefin);
        }

      for($m = 1; $m <= 10; $m++){
          $demandeintervention = new DemandeIntervention();
          $demandeintervention->setDescriptionprobleme($faker->paragraph());
          $demandeintervention->setDateprevu($faker->date($format = 'Y-m-d', $max = 'now')
          );
          
          $manager->persist($demandeintervention);
          }

        
      for($n = 1; $n <= 10; $n++){
        $equipements = new Equipements();
        $equipements->setPrixunitaire($faker->randomNumber(2));
        $equipements->setType($faker->name);
        $equipements->setDesignation($faker->paragraph());
        $equipements->setQuantite($faker->numberBetween(10,20));
        
        
        $manager->persist($equipements);
      }

      for($l = 1; $l <= 10; $l++){
          $interventions = new Interventions();
          $interventions->setLibelleintervention($faker->sentence());
          $interventions->setLieuintervention($faker->city);
          $interventions->setDatedebut($faker->date($format = 'Y-m-d', $max = 'now')
          );
          $interventions->setEtat("grave\pas grave");
          
          
          $manager->persist($interventions);
      }

      for($j = 1; $j <= 10; $j++){
            $planning = new Planning();
            $planning->setDate($faker->date($format = 'Y-m-d', $max = 'now')
            );
            
            
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
        $rapportsintervention->setLibellerapport($faker->sentence());
        $rapportsintervention->setPhoto($faker->imageUrl());
        $rapportsintervention->setPiecejointe($faker->fileExtension);
        
        
        $manager->persist($rapportsintervention);
        }

        for($g = 1; $g <= 10; $g++){
          $role = new Role();
          $role->setLibellerole($faker->sentence());
          
          
          $manager->persist($role);
          }

          for($u = 1; $u <= 10; $u++){
            $villes = new Villes();
            $villes->setNomville($faker->city);
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
  /**
  * Get the description_probleme of this fixture
  * @return string
  */

  public function setDescriptionProbleme(string $description_probleme): self
  {
      $this->description_probleme = $description_probleme;

      return $this;
  }
  /**
  * Get the quantite of this fixture
  * @return int
  */

  public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
  /**
  * Get the libelle_rapport of this fixture
  * @return string
  */

  public function setLibelleRapport(string $libelle_rapport): self
  {
      $this->libelle_rapport = $libelle_rapport;

      return $this;
  }

    
}
