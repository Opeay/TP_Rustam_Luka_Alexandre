<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214085929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, date_enreg DATETIME NOT NULL, date_fin DATETIME NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_C35F0816A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_adresse (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, email_adresse VARCHAR(255) NOT NULL, date_enreg DATETIME NOT NULL, date_fin DATETIME NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_7E9F60D9A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_villes (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, ville VARCHAR(255) NOT NULL, code_postal SMALLINT NOT NULL, region VARCHAR(100) DEFAULT NULL, pay VARCHAR(100) DEFAULT NULL, INDEX IDX_2851EAE34DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, sexe TINYINT(1) NOT NULL, identifiant VARCHAR(50) NOT NULL, nss SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_FCEC9EFC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, numero SMALLINT NOT NULL, description VARCHAR(100) DEFAULT NULL, date_enreg DATETIME NOT NULL, date_fin DATETIME NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_450FF010A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_personne (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE email_adresse ADD CONSTRAINT FK_7E9F60D9A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE liste_villes ADD CONSTRAINT FK_2851EAE34DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFC54C8C93 FOREIGN KEY (type_id) REFERENCES type_personne (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF010A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A21BD112');
        $this->addSql('ALTER TABLE email_adresse DROP FOREIGN KEY FK_7E9F60D9A21BD112');
        $this->addSql('ALTER TABLE liste_villes DROP FOREIGN KEY FK_2851EAE34DE7DC5C');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFC54C8C93');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF010A21BD112');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE email_adresse');
        $this->addSql('DROP TABLE liste_villes');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE type_personne');
    }
}
