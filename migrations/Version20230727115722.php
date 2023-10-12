<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230727115722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association_department DROP FOREIGN KEY FK_EDD68330AE80F5DF');
        $this->addSql('ALTER TABLE association_department DROP FOREIGN KEY FK_EDD68330EFB9C8A5');
        $this->addSql('DROP TABLE association_department');
        $this->addSql('ALTER TABLE host CHANGE address address LONGTEXT DEFAULT NULL, CHANGE zip_code zip_code VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE entreprise entreprise VARCHAR(255) DEFAULT NULL, CHANGE fonction fonction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE image_name_asso image_name_asso VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association_department (association_id INT NOT NULL, department_id INT NOT NULL, INDEX IDX_EDD68330AE80F5DF (department_id), INDEX IDX_EDD68330EFB9C8A5 (association_id), PRIMARY KEY(association_id, department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE association_department ADD CONSTRAINT FK_EDD68330AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association_department ADD CONSTRAINT FK_EDD68330EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE host CHANGE address address LONGTEXT NOT NULL, CHANGE zip_code zip_code VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE entreprise entreprise VARCHAR(255) NOT NULL, CHANGE fonction fonction VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image_name_asso image_name_asso VARCHAR(255) NOT NULL');
    }
}
