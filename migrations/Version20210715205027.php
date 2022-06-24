<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715205027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demand CHANGE DEMAND_TYPE_ID DEMAND_TYPE_ID INT DEFAULT NULL, CHANGE EMPLOYEE_ID EMPLOYEE_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY IF EXISTS FK_428D7973394D2554');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY IF EXISTS FK_428D797340253CC1');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D797340253CC1 FOREIGN KEY (DEMAND_TYPE_ID) REFERENCES demand_type (DEMAND_TYPE_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_eav_type_document_eav DROP FOREIGN KEY FK_ADEB1A5DB082086C');
        $this->addSql('ALTER TABLE document_eav_type_document_eav ADD CONSTRAINT FK_ADEB1A5DB082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demand CHANGE DEMAND_TYPE_ID DEMAND_TYPE_ID INT NOT NULL, CHANGE EMPLOYEE_ID EMPLOYEE_ID INT NOT NULL');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D797340253CC1');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D7973394D2554');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D797340253CC1 FOREIGN KEY (DEMAND_TYPE_ID) REFERENCES demand_type (DEMAND_TYPE_ID)');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID)');
        $this->addSql('ALTER TABLE document_eav_type_document_eav DROP FOREIGN KEY FK_ADEB1A5DB082086C');
        $this->addSql('ALTER TABLE document_eav_type_document_eav ADD CONSTRAINT FK_ADEB1A5DB082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID)');
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
    }
}
