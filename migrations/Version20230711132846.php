<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711132846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, address LONGTEXT NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone_number INT NOT NULL, email VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182AA76ED395');
        $this->addSql('DROP INDEX IDX_8D35182AA76ED395 ON lodging');
        $this->addSql('ALTER TABLE lodging ADD host_id INT DEFAULT NULL, ADD address_lod LONGTEXT NOT NULL, ADD city_lod VARCHAR(255) NOT NULL, CHANGE user_id zipcode_lod INT NOT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('CREATE INDEX IDX_8D35182A1FB8D185 ON lodging (host_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A1FB8D185');
        $this->addSql('DROP TABLE host');
        $this->addSql('DROP INDEX IDX_8D35182A1FB8D185 ON lodging');
        $this->addSql('ALTER TABLE lodging DROP host_id, DROP address_lod, DROP city_lod, CHANGE zipcode_lod user_id INT NOT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D35182AA76ED395 ON lodging (user_id)');
    }
}
