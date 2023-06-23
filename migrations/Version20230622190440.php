<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230622190440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D35182AA76ED395 ON lodging (user_id)');
        $this->addSql('ALTER TABLE user CHANGE phone_user phone_user VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182AA76ED395');
        $this->addSql('DROP INDEX IDX_8D35182AA76ED395 ON lodging');
        $this->addSql('ALTER TABLE user CHANGE phone_user phone_user VARCHAR(255) NOT NULL');
    }
}