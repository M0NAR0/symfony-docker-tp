<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715080946 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE document_eav_type_document_eav (DOCUMENT_EAV_ID INT NOT NULL, DOCUMENT_EAV_TYPE_ID INT NOT NULL, INDEX IDX_ADEB1A5DB082086C (DOCUMENT_EAV_ID), INDEX IDX_ADEB1A5D4352B72F (DOCUMENT_EAV_TYPE_ID), PRIMARY KEY(DOCUMENT_EAV_ID, DOCUMENT_EAV_TYPE_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document_eav_type_document_eav ADD CONSTRAINT FK_ADEB1A5DB082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID)');
        $this->addSql('ALTER TABLE document_eav_type_document_eav ADD CONSTRAINT FK_ADEB1A5D4352B72F FOREIGN KEY (DOCUMENT_EAV_TYPE_ID) REFERENCES document_eav_type (DOCUMENT_EAV_TYPE_ID)');
        $this->addSql('ALTER TABLE document_eav DROP FOREIGN KEY FK_A777ACD24352B72F');
        $this->addSql('DROP INDEX FK_DOCUMENT_EAV_DOCUMENT_EAV_TYPE ON document_eav');
        $this->addSql('ALTER TABLE document_eav DROP DOCUMENT_EAV_TYPE_ID');
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE document_entity_site DROP FOREIGN KEY FK_A32687A5F1B5AEBC');
        $this->addSql('ALTER TABLE document_entity_site ADD CONSTRAINT FK_A32687A5F1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE document_eav_type_document_eav');
        $this->addSql('ALTER TABLE document_eav ADD DOCUMENT_EAV_TYPE_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document_eav ADD CONSTRAINT FK_A777ACD24352B72F FOREIGN KEY (DOCUMENT_EAV_TYPE_ID) REFERENCES document_eav_type (DOCUMENT_EAV_TYPE_ID)');
        $this->addSql('CREATE INDEX FK_DOCUMENT_EAV_DOCUMENT_EAV_TYPE ON document_eav (DOCUMENT_EAV_TYPE_ID)');
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE document_entity_site DROP FOREIGN KEY FK_A32687A5F1B5AEBC');
        $this->addSql('ALTER TABLE document_entity_site ADD CONSTRAINT FK_A32687A5F1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID)');
    }
}
