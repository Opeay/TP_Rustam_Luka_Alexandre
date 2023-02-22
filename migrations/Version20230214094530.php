<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214094530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_villes DROP FOREIGN KEY FK_2851EAE34DE7DC5C');
        $this->addSql('DROP INDEX IDX_2851EAE34DE7DC5C ON liste_villes');
        $this->addSql('ALTER TABLE liste_villes DROP adresse_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_villes ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste_villes ADD CONSTRAINT FK_2851EAE34DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2851EAE34DE7DC5C ON liste_villes (adresse_id)');
    }
}
