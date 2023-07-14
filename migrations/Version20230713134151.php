<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713134151 extends AbstractMigration
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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging_equipement DROP FOREIGN KEY FK_272D355287335AF1');
        $this->addSql('ALTER TABLE lodging_equipement DROP FOREIGN KEY FK_272D3552806F0F5C');
        $this->addSql('DROP TABLE lodging_equipement');
    }
}
