<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629155729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50E394D2554');
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50E8DCA2D63');
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50EF1B5AEBC');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50E394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50E8DCA2D63 FOREIGN KEY (DOCTYPE_ID) REFERENCES document_type (DOCTYPE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50EF1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_type ADD DOCTYPE_CODE VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase_order CHANGE PURCH_ORDER_ASKED_PRICE PURCH_ORDER_ASKED_PRICE TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50E8DCA2D63');
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50E394D2554');
        $this->addSql('ALTER TABLE document_entity DROP FOREIGN KEY FK_B04AF50EF1B5AEBC');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50E8DCA2D63 FOREIGN KEY (DOCTYPE_ID) REFERENCES document_type (DOCTYPE_ID)');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50E394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID)');
        $this->addSql('ALTER TABLE document_entity ADD CONSTRAINT FK_B04AF50EF1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID)');
        $this->addSql('ALTER TABLE document_type DROP DOCTYPE_CODE');
        $this->addSql('ALTER TABLE purchase_order CHANGE PURCH_ORDER_ASKED_PRICE PURCH_ORDER_ASKED_PRICE NUMERIC(10, 2) DEFAULT NULL');
    }
}
