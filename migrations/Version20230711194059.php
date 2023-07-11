<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711194059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, name_asso VARCHAR(255) NOT NULL, description_asso LONGTEXT DEFAULT NULL, website_url VARCHAR(255) DEFAULT NULL, image_name_asso VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', phone_number_asso VARCHAR(255) NOT NULL, email_asso VARCHAR(255) DEFAULT NULL, slug_asso VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_cat VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug_cat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, name_department VARCHAR(255) NOT NULL, code_department INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, cuisine_couvert VARCHAR(255) DEFAULT NULL, cusine_micro_onde VARCHAR(255) DEFAULT NULL, cuisine_plaque_cuisson VARCHAR(255) DEFAULT NULL, sanitaire_toilette VARCHAR(255) DEFAULT NULL, sanitaire_lavabo VARCHAR(255) DEFAULT NULL, sanitaire_douche VARCHAR(255) DEFAULT NULL, couchage_lit VARCHAR(255) DEFAULT NULL, couchage_canape VARCHAR(255) DEFAULT NULL, couchage_autre VARCHAR(255) DEFAULT NULL, nbr_de_lit INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_lodging (equipement_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_86B852F9806F0F5C (equipement_id), INDEX IDX_86B852F987335AF1 (lodging_id), PRIMARY KEY(equipement_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host (id INT AUTO_INCREMENT NOT NULL, address LONGTEXT NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone_number INT NOT NULL, email VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, department_id INT DEFAULT NULL, hosts_id INT DEFAULT NULL, description_lod LONGTEXT DEFAULT NULL, image_name_lod VARCHAR(255) DEFAULT NULL, slug_lod VARCHAR(255) NOT NULL, title_lod VARCHAR(255) NOT NULL, address_lod LONGTEXT NOT NULL, zipcode_lod INT NOT NULL, city_lod VARCHAR(255) NOT NULL, INDEX IDX_8D35182A12469DE2 (category_id), INDEX IDX_8D35182AAE80F5DF (department_id), INDEX IDX_8D35182A7ABC725B (hosts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, phone_user VARCHAR(255) DEFAULT NULL, image_name_user VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_verified TINYINT(1) NOT NULL, nombre_lit INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, entreprise VARCHAR(255) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lodging (user_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_D5380620A76ED395 (user_id), INDEX IDX_D538062087335AF1 (lodging_id), PRIMARY KEY(user_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F9806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_lodging ADD CONSTRAINT FK_86B852F987335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182AAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A7ABC725B FOREIGN KEY (hosts_id) REFERENCES host (id)');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D5380620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D538062087335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F9806F0F5C');
        $this->addSql('ALTER TABLE equipement_lodging DROP FOREIGN KEY FK_86B852F987335AF1');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A12469DE2');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182AAE80F5DF');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A7ABC725B');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D5380620A76ED395');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D538062087335AF1');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE equipement_lodging');
        $this->addSql('DROP TABLE host');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('DROP TABLE user_lodging');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
