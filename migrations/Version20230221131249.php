<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221131249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_cursus (id INT AUTO_INCREMENT NOT NULL, cursus_id_id INT DEFAULT NULL, num_groupe_cursus VARCHAR(20) DEFAULT NULL, date_debut_groupe_cursus DATE DEFAULT NULL, date_fin_groupe_cursus DATE DEFAULT NULL, INDEX IDX_696B5CF9ED70AAB9 (cursus_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_cursus ADD CONSTRAINT FK_696B5CF9ED70AAB9 FOREIGN KEY (cursus_id_id) REFERENCES cursus (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_cursus DROP FOREIGN KEY FK_696B5CF9ED70AAB9');
        $this->addSql('DROP TABLE groupe_cursus');
    }
}
