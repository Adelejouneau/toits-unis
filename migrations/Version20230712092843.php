<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230712092843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association_department (association_id INT NOT NULL, department_id INT NOT NULL, INDEX IDX_EDD68330EFB9C8A5 (association_id), INDEX IDX_EDD68330AE80F5DF (department_id), PRIMARY KEY(association_id, department_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lodging (user_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_D5380620A76ED395 (user_id), INDEX IDX_D538062087335AF1 (lodging_id), PRIMARY KEY(user_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE association_department ADD CONSTRAINT FK_EDD68330EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association_department ADD CONSTRAINT FK_EDD68330AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D5380620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lodging ADD CONSTRAINT FK_D538062087335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association ADD immatriculation_asso INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association_department DROP FOREIGN KEY FK_EDD68330EFB9C8A5');
        $this->addSql('ALTER TABLE association_department DROP FOREIGN KEY FK_EDD68330AE80F5DF');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D5380620A76ED395');
        $this->addSql('ALTER TABLE user_lodging DROP FOREIGN KEY FK_D538062087335AF1');
        $this->addSql('DROP TABLE association_department');
        $this->addSql('DROP TABLE user_lodging');
        $this->addSql('ALTER TABLE association DROP immatriculation_asso');
    }
}
