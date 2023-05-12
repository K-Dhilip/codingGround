<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511131516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_visite (id INT AUTO_INCREMENT NOT NULL, particien_id INT DEFAULT NULL, INDEX IDX_D1D74171D81C1E4A (particien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_visite ADD CONSTRAINT FK_D1D74171D81C1E4A FOREIGN KEY (particien_id) REFERENCES particien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_visite DROP FOREIGN KEY FK_D1D74171D81C1E4A');
        $this->addSql('DROP TABLE rapport_visite');
    }
}
