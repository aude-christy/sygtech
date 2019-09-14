<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190909142533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7F73B9AF23');
        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7FC36D46DB');
        $this->addSql('DROP INDEX IDX_5ADBAD7F73B9AF23 ON interventions');
        $this->addSql('DROP INDEX IDX_5ADBAD7FC36D46DB ON interventions');
        $this->addSql('ALTER TABLE interventions ADD planning INT DEFAULT NULL, ADD datefin INT DEFAULT NULL, ADD datedebut VARCHAR(255) NOT NULL, DROP est_faite_id, DROP avoir_id, DROP libelle_intervention, DROP lieu_intervention, DROP date_debut');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7FD499BFF6 FOREIGN KEY (planning) REFERENCES planning (id)');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7F73F8016A FOREIGN KEY (datefin) REFERENCES date_fin (id)');
        $this->addSql('CREATE INDEX IDX_5ADBAD7FD499BFF6 ON interventions (planning)');
        $this->addSql('CREATE INDEX IDX_5ADBAD7F73F8016A ON interventions (datefin)');
        $this->addSql('ALTER TABLE demande_intervention CHANGE date_prevu date_prevu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE planning CHANGE date date VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE date_fin CHANGE date date VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE agences CHANGE heure_ouverture heure_ouverture VARCHAR(255) NOT NULL, CHANGE heure_fermeture heure_fermeture VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agences CHANGE heure_ouverture heure_ouverture VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE heure_fermeture heure_fermeture VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE date_fin CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE demande_intervention CHANGE date_prevu date_prevu DATE NOT NULL');
        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7FD499BFF6');
        $this->addSql('ALTER TABLE interventions DROP FOREIGN KEY FK_5ADBAD7F73F8016A');
        $this->addSql('DROP INDEX IDX_5ADBAD7FD499BFF6 ON interventions');
        $this->addSql('DROP INDEX IDX_5ADBAD7F73F8016A ON interventions');
        $this->addSql('ALTER TABLE interventions ADD est_faite_id INT DEFAULT NULL, ADD avoir_id INT DEFAULT NULL, ADD lieu_intervention VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD date_debut DATE NOT NULL, DROP planning, DROP datefin, CHANGE datedebut libelle_intervention VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7F73B9AF23 FOREIGN KEY (est_faite_id) REFERENCES planning (id)');
        $this->addSql('ALTER TABLE interventions ADD CONSTRAINT FK_5ADBAD7FC36D46DB FOREIGN KEY (avoir_id) REFERENCES date_fin (id)');
        $this->addSql('CREATE INDEX IDX_5ADBAD7F73B9AF23 ON interventions (est_faite_id)');
        $this->addSql('CREATE INDEX IDX_5ADBAD7FC36D46DB ON interventions (avoir_id)');
        $this->addSql('ALTER TABLE planning CHANGE date date DATE NOT NULL');
    }
}
