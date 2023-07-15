<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230715091350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lodging_equipement (lodging_id INT NOT NULL, equipement_id INT NOT NULL, INDEX IDX_272D355287335AF1 (lodging_id), INDEX IDX_272D3552806F0F5C (equipement_id), PRIMARY KEY(lodging_id, equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lodging_equipement ADD CONSTRAINT FK_272D355287335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_equipement ADD CONSTRAINT FK_272D3552806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F9806F0F5C');
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F987335AF1');
        $this->addSql('DROP TABLE equipement_lodging');
        $this->addSql('ALTER TABLE equipement ADD type_equip VARCHAR(255) NOT NULL, ADD description_equip VARCHAR(255) NOT NULL, DROP cuisine_couvert, DROP cusine_micro_onde, DROP cuisine_plaque_cuisson, DROP sanitaire_toilette, DROP sanitaire_lavabo, DROP sanitaire_douche, DROP couchage_lit, DROP couchage_canape, DROP couchage_autre, DROP nbr_de_lit');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement_lodging (equipement_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_86B852F9806F0F5C (equipement_id), INDEX IDX_86B852F987335AF1 (lodging_id), PRIMARY KEY(equipement_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F9806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F987335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_equipement DROP FOREIGN KEY FK_272D355287335AF1');
        $this->addSql('ALTER TABLE lodging_equipement DROP FOREIGN KEY FK_272D3552806F0F5C');
        $this->addSql('DROP TABLE lodging_equipement');
        $this->addSql('ALTER TABLE equipement ADD cuisine_couvert VARCHAR(255) DEFAULT NULL, ADD cusine_micro_onde VARCHAR(255) DEFAULT NULL, ADD cuisine_plaque_cuisson VARCHAR(255) DEFAULT NULL, ADD sanitaire_toilette VARCHAR(255) DEFAULT NULL, ADD sanitaire_lavabo VARCHAR(255) DEFAULT NULL, ADD sanitaire_douche VARCHAR(255) DEFAULT NULL, ADD couchage_lit VARCHAR(255) DEFAULT NULL, ADD couchage_canape VARCHAR(255) DEFAULT NULL, ADD couchage_autre VARCHAR(255) DEFAULT NULL, ADD nbr_de_lit INT DEFAULT NULL, DROP type_equip, DROP description_equip');
    }
}
