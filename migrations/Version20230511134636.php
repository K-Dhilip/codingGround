<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511134636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE travailler (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_viste ADD particien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rapport_viste ADD CONSTRAINT FK_F690BC09D81C1E4A FOREIGN KEY (particien_id) REFERENCES particien (id)');
        $this->addSql('CREATE INDEX IDX_F690BC09D81C1E4A ON rapport_viste (particien_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE travailler');
        $this->addSql('ALTER TABLE rapport_viste DROP FOREIGN KEY FK_F690BC09D81C1E4A');
        $this->addSql('DROP INDEX IDX_F690BC09D81C1E4A ON rapport_viste');
        $this->addSql('ALTER TABLE rapport_viste DROP particien_id');
    }
}
