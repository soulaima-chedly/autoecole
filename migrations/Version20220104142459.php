<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104142459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE condidat (id INT AUTO_INCREMENT NOT NULL, idex_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, numcin INT NOT NULL, numtel INT NOT NULL, country VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, INDEX IDX_3A8ACF2C767EF768 (idex_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, dateexamandecode DATE NOT NULL, resultexcode VARCHAR(255) NOT NULL, date_examenpratique DATE NOT NULL, resultat_examan_pratique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat_examan (id INT AUTO_INCREMENT NOT NULL, idc_id INT DEFAULT NULL, resultat VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5DB136B542186A73 (idc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance_deformation (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, idc_id INT DEFAULT NULL, datedeformation DATE NOT NULL, idcondidat VARCHAR(255) NOT NULL, prixparheure INT NOT NULL, INDEX IDX_27DF6538181A8BA (voiture_id), INDEX IDX_27DF653842186A73 (idc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, idv_id INT DEFAULT NULL, matricule INT NOT NULL, assurance VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E9E2810F25DFCDDE (idv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE condidat ADD CONSTRAINT FK_3A8ACF2C767EF768 FOREIGN KEY (idex_id) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE resultat_examan ADD CONSTRAINT FK_5DB136B542186A73 FOREIGN KEY (idc_id) REFERENCES condidat (id)');
        $this->addSql('ALTER TABLE seance_deformation ADD CONSTRAINT FK_27DF6538181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE seance_deformation ADD CONSTRAINT FK_27DF653842186A73 FOREIGN KEY (idc_id) REFERENCES condidat (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F25DFCDDE FOREIGN KEY (idv_id) REFERENCES examen (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat_examan DROP FOREIGN KEY FK_5DB136B542186A73');
        $this->addSql('ALTER TABLE seance_deformation DROP FOREIGN KEY FK_27DF653842186A73');
        $this->addSql('ALTER TABLE condidat DROP FOREIGN KEY FK_3A8ACF2C767EF768');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F25DFCDDE');
        $this->addSql('ALTER TABLE seance_deformation DROP FOREIGN KEY FK_27DF6538181A8BA');
        $this->addSql('DROP TABLE condidat');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE resultat_examan');
        $this->addSql('DROP TABLE seance_deformation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voiture');
    }
}
