<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511142431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_viste_medicament_medicament (rapport_viste_medicament_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_868AA4279A0B8069 (rapport_viste_medicament_id), INDEX IDX_868AA427AB0D61F7 (medicament_id), PRIMARY KEY(rapport_viste_medicament_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_viste_medicament_medicament ADD CONSTRAINT FK_868AA4279A0B8069 FOREIGN KEY (rapport_viste_medicament_id) REFERENCES rapport_viste_medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rapport_viste_medicament_medicament ADD CONSTRAINT FK_868AA427AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_viste_medicament_medicament DROP FOREIGN KEY FK_868AA4279A0B8069');
        $this->addSql('ALTER TABLE rapport_viste_medicament_medicament DROP FOREIGN KEY FK_868AA427AB0D61F7');
        $this->addSql('DROP TABLE rapport_viste_medicament_medicament');
    }
}
