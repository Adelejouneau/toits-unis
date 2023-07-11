<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711165423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, cuisine_couvert VARCHAR(255) DEFAULT NULL, cusine_micro_onde VARCHAR(255) DEFAULT NULL, cuisine_plaque_cuisson VARCHAR(255) DEFAULT NULL, sanitaire_toilette VARCHAR(255) DEFAULT NULL, sanitaire_lavabo VARCHAR(255) DEFAULT NULL, sanitaire_douche VARCHAR(255) DEFAULT NULL, couchage_lit VARCHAR(255) DEFAULT NULL, couchage_canape VARCHAR(255) DEFAULT NULL, couchage_autre VARCHAR(255) DEFAULT NULL, nbr_de_lit INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_lodging (equipement_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_86B852F9806F0F5C (equipement_id), INDEX IDX_86B852F987335AF1 (lodging_id), PRIMARY KEY(equipement_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lodging (user_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_D5380620A76ED395 (user_id), INDEX IDX_D538062087335AF1 (lodging_id), PRIMARY KEY(user_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F9806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F987335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D5380620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D538062087335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matched DROP FOREIGN KEY FK_85F5907D87335AF1');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C86FEB23F');
        $this->addSql('DROP TABLE matched');
        $this->addSql('DROP TABLE comment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matched (id INT AUTO_INCREMENT NOT NULL, lodging_id INT DEFAULT NULL, INDEX IDX_85F5907D87335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, matched_id INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', description_comment LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_9474526C86FEB23F (matched_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE matched ADD CONSTRAINT FK_85F5907D87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C86FEB23F FOREIGN KEY (matched_id) REFERENCES matched (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F9806F0F5C');
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F987335AF1');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D5380620A76ED395');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D538062087335AF1');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE equipement_lodging');
        $this->addSql('DROP TABLE user_lodging');
    }
}
