<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511092609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE visiteur_region (visiteur_id INT NOT NULL, region_id INT NOT NULL, INDEX IDX_25720CBA7F72333D (visiteur_id), INDEX IDX_25720CBA98260155 (region_id), PRIMARY KEY(visiteur_id, region_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visiteur_region ADD CONSTRAINT FK_25720CBA7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visiteur_region ADD CONSTRAINT FK_25720CBA98260155 FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B998260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_F804D3B998260155 ON employe (region_id)');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1761B65292');
        $this->addSql('DROP INDEX IDX_F62F1761B65292 ON region');
        $this->addSql('ALTER TABLE region DROP employe_id');
        $this->addSql('ALTER TABLE visiteur ADD prenom VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiteur_region DROP FOREIGN KEY FK_25720CBA7F72333D');
        $this->addSql('ALTER TABLE visiteur_region DROP FOREIGN KEY FK_25720CBA98260155');
        $this->addSql('DROP TABLE visiteur_region');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B998260155');
        $this->addSql('DROP INDEX IDX_F804D3B998260155 ON employe');
        $this->addSql('ALTER TABLE employe DROP region_id');
        $this->addSql('ALTER TABLE region ADD employe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1761B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('CREATE INDEX IDX_F62F1761B65292 ON region (employe_id)');
        $this->addSql('ALTER TABLE visiteur DROP prenom');
    }
}
