<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230930112738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, commercial_id INT DEFAULT NULL, partenaire_id INT DEFAULT NULL, type_client VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, localisation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone_un INT NOT NULL, telephone_deux INT DEFAULT NULL, telephone_trois INT DEFAULT NULL, cni VARCHAR(255) NOT NULL, cni_photo_recto LONGTEXT NOT NULL, cni_photo_verso LONGTEXT NOT NULL, photo_profile LONGTEXT NOT NULL, registre_commerce VARCHAR(255) DEFAULT NULL, registre_commerce_photo_recto LONGTEXT DEFAULT NULL, registre_commerce_photo_verso LONGTEXT DEFAULT NULL, offre_choisie VARCHAR(255) NOT NULL, souscription_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', signature VARCHAR(255) DEFAULT NULL, nom_partenaire VARCHAR(255) DEFAULT NULL, email_partenaire VARCHAR(255) DEFAULT NULL, localisation_gps VARCHAR(255) DEFAULT NULL, plan_localisation VARCHAR(255) DEFAULT NULL, id_commercial INT NOT NULL, id_partenaire INT NOT NULL, INDEX IDX_C82E747854071C (commercial_id), INDEX IDX_C82E7498DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commerciaux (id INT AUTO_INCREMENT NOT NULL, partenaire_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', password VARCHAR(255) NOT NULL, id_partenaire INT NOT NULL, matricule_camtel INT DEFAULT NULL, agence_attache VARCHAR(255) DEFAULT NULL, localisation VARCHAR(255) NOT NULL, photo LONGTEXT NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', numero_cni VARCHAR(255) NOT NULL, INDEX IDX_26C4628798DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaires (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', numero_cni VARCHAR(255) NOT NULL, partenaire_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techniciens (id INT AUTO_INCREMENT NOT NULL, partenaire_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_cni VARCHAR(255) NOT NULL, telephone INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', password VARCHAR(255) NOT NULL, id_partenaire INT NOT NULL, ceraf_attache VARCHAR(255) DEFAULT NULL, matricule_camtel INT DEFAULT NULL, localisation VARCHAR(255) NOT NULL, photo LONGTEXT NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_64F2EA9C98DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E747854071C FOREIGN KEY (commercial_id) REFERENCES commerciaux (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E7498DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaires (id)');
        $this->addSql('ALTER TABLE commerciaux ADD CONSTRAINT FK_26C4628798DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaires (id)');
        $this->addSql('ALTER TABLE techniciens ADD CONSTRAINT FK_64F2EA9C98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaires (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E747854071C');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E7498DE13AC');
        $this->addSql('ALTER TABLE commerciaux DROP FOREIGN KEY FK_26C4628798DE13AC');
        $this->addSql('ALTER TABLE techniciens DROP FOREIGN KEY FK_64F2EA9C98DE13AC');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE commerciaux');
        $this->addSql('DROP TABLE partenaires');
        $this->addSql('DROP TABLE techniciens');
        $this->addSql('DROP TABLE user');
    }
}
