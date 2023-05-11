<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511081421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE region ADD visiteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1767F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_F62F1767F72333D ON region (visiteur_id)');
        $this->addSql('ALTER TABLE visiteur ADD prenom VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1767F72333D');
        $this->addSql('DROP INDEX IDX_F62F1767F72333D ON region');
        $this->addSql('ALTER TABLE region DROP visiteur_id');
        $this->addSql('ALTER TABLE visiteur DROP prenom');
    }
}
