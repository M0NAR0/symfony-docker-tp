<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610163159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demand (DEMAND_ID INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, sending_date DATETIME NOT NULL, status TINYINT(1) NOT NULL, DEMAND_TYPE_ID INT NOT NULL, EMPLOYEE_ID INT NOT NULL, INDEX IDX_428D797340253CC1 (DEMAND_TYPE_ID), INDEX IDX_428D7973394D2554 (EMPLOYEE_ID), PRIMARY KEY(DEMAND_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demand_type (DEMAND_TYPE_ID INT AUTO_INCREMENT NOT NULL, DEMAND_TYPE_LABEL VARCHAR(255) NOT NULL, PRIMARY KEY(DEMAND_TYPE_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D797340253CC1 FOREIGN KEY (DEMAND_TYPE_ID) REFERENCES demand_type (DEMAND_TYPE_ID)');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID)');
        $this->addSql('ALTER TABLE employee CHANGE EMPLOYEE_HASHED_MDP EMPLOYEE_HASHED_MDP CHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D797340253CC1');
        $this->addSql('DROP TABLE demand');
        $this->addSql('DROP TABLE demand_type');
        $this->addSql('ALTER TABLE employee CHANGE EMPLOYEE_HASHED_MDP EMPLOYEE_HASHED_MDP VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
