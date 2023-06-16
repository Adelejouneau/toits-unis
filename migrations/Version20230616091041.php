<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230616091041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, department_id INT NOT NULL, street_number VARCHAR(255) NOT NULL, street_name VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81AE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, name_asso VARCHAR(255) NOT NULL, description_asso LONGTEXT DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, image_name_asso VARCHAR(255) DEFAULT NULL, phone_number_asso VARCHAR(255) NOT NULL, email_asso VARCHAR(255) DEFAULT NULL, slug_asso VARCHAR(255) NOT NULL, INDEX IDX_FD8521CCF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_cat VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug_cat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, matched_id INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', description_comment LONGTEXT DEFAULT NULL, INDEX IDX_9474526C86FEB23F (matched_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, entry_date VARCHAR(255) NOT NULL, leaving_date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, name_department VARCHAR(255) NOT NULL, code_department INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guest (id INT AUTO_INCREMENT NOT NULL, association_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, phone_user VARCHAR(255) NOT NULL, image_name_user VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', gender VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, hobbies_guest LONGTEXT DEFAULT NULL, nbr_lits_guest INT NOT NULL, UNIQUE INDEX UNIQ_ACB79A35E7927C74 (email), INDEX IDX_ACB79A35EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, phone_user VARCHAR(255) NOT NULL, image_name_user VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', gender VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, entreprise VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_CF2713FDE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, host_id INT NOT NULL, department_id INT DEFAULT NULL, description_lod LONGTEXT DEFAULT NULL, image_name_lod VARCHAR(255) DEFAULT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, slug_lod VARCHAR(255) NOT NULL, title_lod VARCHAR(255) NOT NULL, INDEX IDX_8D35182A12469DE2 (category_id), INDEX IDX_8D35182A1FB8D185 (host_id), INDEX IDX_8D35182AAE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging_date (lodging_id INT NOT NULL, date_id INT NOT NULL, INDEX IDX_45EACEC987335AF1 (lodging_id), INDEX IDX_45EACEC9B897366B (date_id), PRIMARY KEY(lodging_id, date_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matched (id INT AUTO_INCREMENT NOT NULL, guest_id INT DEFAULT NULL, lodging_id INT DEFAULT NULL, INDEX IDX_85F5907D9A4AA658 (guest_id), INDEX IDX_85F5907D87335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, phone_user VARCHAR(255) NOT NULL, image_name_user VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', gender VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CCF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C86FEB23F FOREIGN KEY (matched_id) REFERENCES matched (id)');
        $this->addSql('ALTER TABLE guest ADD CONSTRAINT FK_ACB79A35EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182AAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE lodging_date ADD CONSTRAINT FK_45EACEC987335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_date ADD CONSTRAINT FK_45EACEC9B897366B FOREIGN KEY (date_id) REFERENCES date (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matched ADD CONSTRAINT FK_85F5907D9A4AA658 FOREIGN KEY (guest_id) REFERENCES guest (id)');
        $this->addSql('ALTER TABLE matched ADD CONSTRAINT FK_85F5907D87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81AE80F5DF');
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CCF5B7AF75');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C86FEB23F');
        $this->addSql('ALTER TABLE guest DROP FOREIGN KEY FK_ACB79A35EFB9C8A5');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A12469DE2');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A1FB8D185');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182AAE80F5DF');
        $this->addSql('ALTER TABLE lodging_date DROP FOREIGN KEY FK_45EACEC987335AF1');
        $this->addSql('ALTER TABLE lodging_date DROP FOREIGN KEY FK_45EACEC9B897366B');
        $this->addSql('ALTER TABLE matched DROP FOREIGN KEY FK_85F5907D9A4AA658');
        $this->addSql('ALTER TABLE matched DROP FOREIGN KEY FK_85F5907D87335AF1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE guest');
        $this->addSql('DROP TABLE host');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE lodging_date');
        $this->addSql('DROP TABLE matched');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
