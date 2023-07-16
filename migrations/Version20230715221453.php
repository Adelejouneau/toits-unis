<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230715221453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association CHANGE immatriculation_asso immatriculation_asso VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE immatriculation_asso immatriculation_asso VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association CHANGE immatriculation_asso immatriculation_asso INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE immatriculation_asso immatriculation_asso INT NOT NULL');
    }
}
