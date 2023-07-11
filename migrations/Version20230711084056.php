<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711084056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A1FB8D185');
        $this->addSql('DROP INDEX IDX_8D35182A1FB8D185 ON lodging');
        $this->addSql('ALTER TABLE lodging CHANGE host_id hosts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A7ABC725B FOREIGN KEY (hosts_id) REFERENCES host (id)');
        $this->addSql('CREATE INDEX IDX_8D35182A7ABC725B ON lodging (hosts_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A7ABC725B');
        $this->addSql('DROP INDEX IDX_8D35182A7ABC725B ON lodging');
        $this->addSql('ALTER TABLE lodging CHANGE hosts_id host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D35182A1FB8D185 ON lodging (host_id)');
    }
}
