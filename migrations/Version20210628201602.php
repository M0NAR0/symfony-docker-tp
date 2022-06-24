<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628201602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1D10B9A56');
        $this->addSql('ALTER TABLE employee CHANGE EMPLOYEE_HASHED_MDP EMPLOYEE_HASHED_MDP CHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1D10B9A56 FOREIGN KEY (ROLE_ID) REFERENCES role (ROLE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE purchase_order CHANGE PURCH_ORDER_ASKED_PRICE PURCH_ORDER_ASKED_PRICE TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1D10B9A56');
        $this->addSql('ALTER TABLE employee CHANGE EMPLOYEE_HASHED_MDP EMPLOYEE_HASHED_MDP VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1D10B9A56 FOREIGN KEY (ROLE_ID) REFERENCES role (ROLE_ID)');
        $this->addSql('ALTER TABLE purchase_order CHANGE PURCH_ORDER_ASKED_PRICE PURCH_ORDER_ASKED_PRICE NUMERIC(10, 2) DEFAULT NULL');
    }
}
