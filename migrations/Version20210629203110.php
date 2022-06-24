<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629203110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_entity_boolean ADD DOCUMENT_EAV_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document_entity_boolean ADD CONSTRAINT FK_63054F47B082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_63054F47B082086C ON document_entity_boolean (DOCUMENT_EAV_ID)');
        $this->addSql('ALTER TABLE document_entity_date ADD DOCUMENT_EAV_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document_entity_date ADD CONSTRAINT FK_60FBB93BB082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_60FBB93BB082086C ON document_entity_date (DOCUMENT_EAV_ID)');
        $this->addSql('ALTER TABLE document_entity_int ADD DOCUMENT_EAV_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document_entity_int ADD CONSTRAINT FK_CB1D1140B082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_CB1D1140B082086C ON document_entity_int (DOCUMENT_EAV_ID)');
        $this->addSql('ALTER TABLE document_entity_varchar DROP FOREIGN KEY FK_16541A937671AC3F');
        $this->addSql('ALTER TABLE document_entity_varchar ADD DOCUMENT_EAV_ID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document_entity_varchar ADD CONSTRAINT FK_16541A93B082086C FOREIGN KEY (DOCUMENT_EAV_ID) REFERENCES document_eav (DOCUMENT_EAV_ID) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE document_entity_varchar ADD CONSTRAINT FK_16541A937671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_16541A93B082086C ON document_entity_varchar (DOCUMENT_EAV_ID)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_entity_boolean DROP FOREIGN KEY FK_63054F47B082086C');
        $this->addSql('DROP INDEX IDX_63054F47B082086C ON document_entity_boolean');
        $this->addSql('ALTER TABLE document_entity_boolean DROP DOCUMENT_EAV_ID');
        $this->addSql('ALTER TABLE document_entity_date DROP FOREIGN KEY FK_60FBB93BB082086C');
        $this->addSql('DROP INDEX IDX_60FBB93BB082086C ON document_entity_date');
        $this->addSql('ALTER TABLE document_entity_date DROP DOCUMENT_EAV_ID');
        $this->addSql('ALTER TABLE document_entity_int DROP FOREIGN KEY FK_CB1D1140B082086C');
        $this->addSql('DROP INDEX IDX_CB1D1140B082086C ON document_entity_int');
        $this->addSql('ALTER TABLE document_entity_int DROP DOCUMENT_EAV_ID');
        $this->addSql('ALTER TABLE document_entity_varchar DROP FOREIGN KEY FK_16541A93B082086C');
        $this->addSql('ALTER TABLE document_entity_varchar DROP FOREIGN KEY FK_16541A937671AC3F');
        $this->addSql('DROP INDEX IDX_16541A93B082086C ON document_entity_varchar');
        $this->addSql('ALTER TABLE document_entity_varchar DROP DOCUMENT_EAV_ID');
        $this->addSql('ALTER TABLE document_entity_varchar ADD CONSTRAINT FK_16541A937671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
    }
}
