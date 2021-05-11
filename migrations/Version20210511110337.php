<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511110337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cooperateur_poste (cooperateur_id INT NOT NULL, poste_id INT NOT NULL, INDEX IDX_D977E00470A088CD (cooperateur_id), INDEX IDX_D977E004A0905086 (poste_id), PRIMARY KEY(cooperateur_id, poste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cooperateur_creneau (cooperateur_id INT NOT NULL, creneau_id INT NOT NULL, INDEX IDX_E04C716E70A088CD (cooperateur_id), INDEX IDX_E04C716E7D0729A9 (creneau_id), PRIMARY KEY(cooperateur_id, creneau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creneau (id INT AUTO_INCREMENT NOT NULL, debut DATETIME NOT NULL, fin DATETIME NOT NULL, effectifs LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, taches VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cooperateur_poste ADD CONSTRAINT FK_D977E00470A088CD FOREIGN KEY (cooperateur_id) REFERENCES cooperateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cooperateur_poste ADD CONSTRAINT FK_D977E004A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cooperateur_creneau ADD CONSTRAINT FK_E04C716E70A088CD FOREIGN KEY (cooperateur_id) REFERENCES cooperateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cooperateur_creneau ADD CONSTRAINT FK_E04C716E7D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cooperateur CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cooperateur_creneau DROP FOREIGN KEY FK_E04C716E7D0729A9');
        $this->addSql('ALTER TABLE cooperateur_poste DROP FOREIGN KEY FK_D977E004A0905086');
        $this->addSql('DROP TABLE cooperateur_poste');
        $this->addSql('DROP TABLE cooperateur_creneau');
        $this->addSql('DROP TABLE creneau');
        $this->addSql('DROP TABLE poste');
        $this->addSql('ALTER TABLE cooperateur CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
