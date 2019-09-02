<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902151901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE interventions (id INT AUTO_INCREMENT NOT NULL, est_faite_id INT DEFAULT NULL, avoir_id INT DEFAULT NULL, libelle_intervention VARCHAR(255) NOT NULL, lieu_intervention VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_5ADBAD7F73B9AF23 (est_faite_id), INDEX IDX_5ADBAD7FC36D46DB (avoir_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipements (id INT AUTO_INCREMENT NOT NULL, prix_unitaire INT NOT NULL, type VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, quantité INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_intervention (id INT AUTO_INCREMENT NOT NULL, date_prevu DATE NOT NULL, description_probleme LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_intervention_interventions (demande_intervention_id INT NOT NULL, interventions_id INT NOT NULL, INDEX IDX_943E54CD7607473E (demande_intervention_id), INDEX IDX_943E54CD334423FF (interventions_id), PRIMARY KEY(demande_intervention_id, interventions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_intervention_agences (demande_intervention_id INT NOT NULL, agences_id INT NOT NULL, INDEX IDX_69DD7527607473E (demande_intervention_id), INDEX IDX_69DD7529917E4AB (agences_id), PRIMARY KEY(demande_intervention_id, agences_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date_fin (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villes (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, longitude DOUBLE PRECISION NOT NULL, lattitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle_role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapports_intervention (id INT AUTO_INCREMENT NOT NULL, datefin_id INT DEFAULT NULL, libelle_rapport VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, piece_jointe VARCHAR(255) NOT NULL, INDEX IDX_570AB66897CC0DA (datefin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapports_intervention_equipements (rapports_intervention_id INT NOT NULL, equipements_id INT NOT NULL, INDEX IDX_C8525EA637ED66B9 (rapports_intervention_id), INDEX IDX_C8525EA6852CCFF5 (equipements_id), PRIMARY KEY(rapports_intervention_id, equipements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agences (id INT AUTO_INCREMENT NOT NULL, villes_id INT DEFAULT NULL, nom_agence VARCHAR(255) NOT NULL, heure_ouverture TIME NOT NULL, heure_fermeture TIME NOT NULL, longitude DOUBLE PRECISION NOT NULL, lattitude DOUBLE PRECISION NOT NULL, INDEX IDX_B46015DD286C17BC (villes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7F73B9AF23 FOREIGN KEY (est_faite_id) REFERENCES planning (id)');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7FC36D46DB FOREIGN KEY (avoir_id) REFERENCES date_fin (id)');
        $this->addSql('ALTER TABLE demande_intervention_interventions ADD CONSTRAINT FK_943E54CD7607473E FOREIGN KEY (demande_intervention_id) REFERENCES demande_intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_intervention_interventions ADD CONSTRAINT FK_943E54CD334423FF FOREIGN KEY (interventions_id) REFERENCES interventions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_intervention_agences ADD CONSTRAINT FK_69DD7527607473E FOREIGN KEY (demande_intervention_id) REFERENCES demande_intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_intervention_agences ADD CONSTRAINT FK_69DD7529917E4AB FOREIGN KEY (agences_id) REFERENCES agences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rapports_intervention ADD CONSTRAINT FK_570AB66897CC0DA FOREIGN KEY (datefin_id) REFERENCES date_fin (id)');
        $this->addSql('ALTER TABLE rapports_intervention_equipements ADD CONSTRAINT FK_C8525EA637ED66B9 FOREIGN KEY (rapports_intervention_id) REFERENCES rapports_intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rapports_intervention_equipements ADD CONSTRAINT FK_C8525EA6852CCFF5 FOREIGN KEY (equipements_id) REFERENCES equipements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agences ADD CONSTRAINT FK_B46015DD286C17BC FOREIGN KEY (villes_id) REFERENCES villes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_intervention_interventions DROP FOREIGN KEY FK_943E54CD334423FF');
        $this->addSql('ALTER TABLE rapports_intervention_equipements DROP FOREIGN KEY FK_C8525EA6852CCFF5');
        $this->addSql('ALTER TABLE demande_intervention_interventions DROP FOREIGN KEY FK_943E54CD7607473E');
        $this->addSql('ALTER TABLE demande_intervention_agences DROP FOREIGN KEY FK_69DD7527607473E');
        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7F73B9AF23');
        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7FC36D46DB');
        $this->addSql('ALTER TABLE rapports_intervention DROP FOREIGN KEY FK_570AB66897CC0DA');
        $this->addSql('ALTER TABLE agences DROP FOREIGN KEY FK_B46015DD286C17BC');
        $this->addSql('ALTER TABLE rapports_intervention_equipements DROP FOREIGN KEY FK_C8525EA637ED66B9');
        $this->addSql('ALTER TABLE demande_intervention_agences DROP FOREIGN KEY FK_69DD7529917E4AB');
        $this->addSql('DROP TABLE interventions');
        $this->addSql('DROP TABLE equipements');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE demande_intervention');
        $this->addSql('DROP TABLE demande_intervention_interventions');
        $this->addSql('DROP TABLE demande_intervention_agences');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE date_fin');
        $this->addSql('DROP TABLE villes');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE rapports_intervention');
        $this->addSql('DROP TABLE rapports_intervention_equipements');
        $this->addSql('DROP TABLE agences');
    }
}
