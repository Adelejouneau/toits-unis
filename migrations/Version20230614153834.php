<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614153834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lodging_date (lodging_id INT NOT NULL, date_id INT NOT NULL, INDEX IDX_45EACEC987335AF1 (lodging_id), INDEX IDX_45EACEC9B897366B (date_id), PRIMARY KEY(lodging_id, date_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matched (id INT AUTO_INCREMENT NOT NULL, guest_id INT DEFAULT NULL, lodging_id INT DEFAULT NULL, INDEX IDX_85F5907D9A4AA658 (guest_id), INDEX IDX_85F5907D87335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lodging_date ADD CONSTRAINT FK_45EACEC987335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_date ADD CONSTRAINT FK_45EACEC9B897366B FOREIGN KEY (date_id) REFERENCES date (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matched ADD CONSTRAINT FK_85F5907D9A4AA658 FOREIGN KEY (guest_id) REFERENCES guest (id)');
        $this->addSql('ALTER TABLE matched ADD CONSTRAINT FK_85F5907D87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE association ADD address_id INT NOT NULL');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CCF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_FD8521CCF5B7AF75 ON association (address_id)');
        $this->addSql('ALTER TABLE comment ADD matched_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C86FEB23F FOREIGN KEY (matched_id) REFERENCES matched (id)');
        $this->addSql('CREATE INDEX IDX_9474526C86FEB23F ON comment (matched_id)');
        $this->addSql('ALTER TABLE guest ADD association_id INT NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD email_user VARCHAR(255) NOT NULL, ADD phone_user VARCHAR(255) NOT NULL, ADD image_name_user VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD gender VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE guest ADD CONSTRAINT FK_ACB79A35EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ACB79A35E7927C74 ON guest (email)');
        $this->addSql('CREATE INDEX IDX_ACB79A35EFB9C8A5 ON guest (association_id)');
        $this->addSql('ALTER TABLE host ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD email_user VARCHAR(255) NOT NULL, ADD phone_user VARCHAR(255) NOT NULL, ADD image_name_user VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD gender VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CF2713FDE7927C74 ON host (email)');
        $this->addSql('ALTER TABLE lodging ADD category_id INT NOT NULL, ADD host_id INT NOT NULL');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A1FB8D185 FOREIGN KEY (host_id) REFERENCES host (id)');
        $this->addSql('CREATE INDEX IDX_8D35182A12469DE2 ON lodging (category_id)');
        $this->addSql('CREATE INDEX IDX_8D35182A1FB8D185 ON lodging (host_id)');
        $this->addSql('ALTER TABLE user ADD address_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F5B7AF75 ON user (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C86FEB23F');
        $this->addSql('ALTER TABLE lodging_date DROP FOREIGN KEY FK_45EACEC987335AF1');
        $this->addSql('ALTER TABLE lodging_date DROP FOREIGN KEY FK_45EACEC9B897366B');
        $this->addSql('ALTER TABLE matched DROP FOREIGN KEY FK_85F5907D9A4AA658');
        $this->addSql('ALTER TABLE matched DROP FOREIGN KEY FK_85F5907D87335AF1');
        $this->addSql('DROP TABLE lodging_date');
        $this->addSql('DROP TABLE matched');
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CCF5B7AF75');
        $this->addSql('DROP INDEX IDX_FD8521CCF5B7AF75 ON association');
        $this->addSql('ALTER TABLE association DROP address_id');
        $this->addSql('DROP INDEX IDX_9474526C86FEB23F ON comment');
        $this->addSql('ALTER TABLE comment DROP matched_id');
        $this->addSql('ALTER TABLE guest DROP FOREIGN KEY FK_ACB79A35EFB9C8A5');
        $this->addSql('DROP INDEX UNIQ_ACB79A35E7927C74 ON guest');
        $this->addSql('DROP INDEX IDX_ACB79A35EFB9C8A5 ON guest');
        $this->addSql('ALTER TABLE guest DROP association_id, DROP email, DROP roles, DROP password, DROP last_name, DROP first_name, DROP email_user, DROP phone_user, DROP image_name_user, DROP updated_at, DROP gender');
        $this->addSql('DROP INDEX UNIQ_CF2713FDE7927C74 ON host');
        $this->addSql('ALTER TABLE host DROP email, DROP roles, DROP password, DROP last_name, DROP first_name, DROP email_user, DROP phone_user, DROP image_name_user, DROP updated_at, DROP gender');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A12469DE2');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A1FB8D185');
        $this->addSql('DROP INDEX IDX_8D35182A12469DE2 ON lodging');
        $this->addSql('DROP INDEX IDX_8D35182A1FB8D185 ON lodging');
        $this->addSql('ALTER TABLE lodging DROP category_id, DROP host_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('DROP INDEX IDX_8D93D649F5B7AF75 ON user');
        $this->addSql('ALTER TABLE user DROP address_id');
    }
}
