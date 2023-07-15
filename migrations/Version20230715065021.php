<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230715065021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_department (user_id INT NOT NULL, department_id INT NOT NULL, INDEX IDX_6A7A2766A76ED395 (user_id), INDEX IDX_6A7A2766AE80F5DF (department_id), PRIMARY KEY(user_id, department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_department ADD CONSTRAINT FK_6A7A2766A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_department ADD CONSTRAINT FK_6A7A2766AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD name_asso VARCHAR(255) NOT NULL, ADD website_url VARCHAR(255) DEFAULT NULL, ADD phone_number_asso VARCHAR(255) NOT NULL, ADD image_name_asso VARCHAR(255) DEFAULT NULL, ADD slug_asso VARCHAR(255) NOT NULL, ADD immatriculation_asso INT NOT NULL, DROP last_name, DROP first_name, DROP phone_user, DROP image_name_user, DROP nombre_lit, DROP entreprise, DROP fonction, CHANGE description description_asso LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_department DROP FOREIGN KEY FK_6A7A2766A76ED395');
        $this->addSql('ALTER TABLE user_department DROP FOREIGN KEY FK_6A7A2766AE80F5DF');
        $this->addSql('DROP TABLE user_department');
        $this->addSql('ALTER TABLE user ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD phone_user VARCHAR(255) DEFAULT NULL, ADD image_name_user VARCHAR(255) DEFAULT NULL, ADD nombre_lit INT DEFAULT NULL, ADD entreprise VARCHAR(255) DEFAULT NULL, ADD fonction VARCHAR(255) DEFAULT NULL, DROP name_asso, DROP website_url, DROP phone_number_asso, DROP image_name_asso, DROP slug_asso, DROP immatriculation_asso, CHANGE description_asso description LONGTEXT DEFAULT NULL');
    }
}
