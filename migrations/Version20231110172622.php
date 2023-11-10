<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110172622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host CHANGE address address LONGTEXT DEFAULT NULL, CHANGE zip_code zip_code VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE entreprise entreprise VARCHAR(255) DEFAULT NULL, CHANGE fonction fonction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE image_name_asso image_name_asso VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE image_name_asso image_name_asso VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE host CHANGE address address LONGTEXT NOT NULL, CHANGE zip_code zip_code VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE entreprise entreprise VARCHAR(255) NOT NULL, CHANGE fonction fonction VARCHAR(255) NOT NULL');
    }
}
