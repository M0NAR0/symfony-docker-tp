<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624202654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reset_password');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reset_password (RESET_PSWD_ID INT AUTO_INCREMENT NOT NULL, RESET_PSWD_CODE VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, RESET_PSWD_STATUS TINYINT(1) DEFAULT NULL, RESET_PSWD_CREATED_AT DATE DEFAULT NULL, EMPLOYEE_ID INT DEFAULT NULL, INDEX FK_RESET_PASSWORD_EMPLOYEE (EMPLOYEE_ID), PRIMARY KEY(RESET_PSWD_ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reset_password ADD CONSTRAINT FK_B9983CE5394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID)');
    }
}
