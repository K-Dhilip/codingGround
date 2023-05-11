<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511083015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE visiteur_region (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visiteur ADD visiteur_region_id INT NOT NULL');
        $this->addSql('ALTER TABLE visiteur ADD CONSTRAINT FK_4EA587B8BC36E1CF FOREIGN KEY (visiteur_region_id) REFERENCES visiteur_region (id)');
        $this->addSql('CREATE INDEX IDX_4EA587B8BC36E1CF ON visiteur (visiteur_region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visiteur DROP FOREIGN KEY FK_4EA587B8BC36E1CF');
        $this->addSql('DROP TABLE visiteur_region');
        $this->addSql('DROP INDEX IDX_4EA587B8BC36E1CF ON visiteur');
        $this->addSql('ALTER TABLE visiteur DROP visiteur_region_id');
    }
}
