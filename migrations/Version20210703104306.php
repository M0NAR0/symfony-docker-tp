<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703104306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE document_eav_type_document_entity (DOCUMENT_ID INT NOT NULL, DOCUMENT_EAV_TYPE_ID INT NOT NULL, INDEX FK_N_DOCUMENT_EAV_TYPE_DOCUMENT_ENTITY_DOCUMENT_ENTITY (DOCUMENT_ID), INDEX FK_N_DOCUMENT_EAV_TYPE_DOCUMENT_ENTITY_DOCUMENT_EAV_TYPE (DOCUMENT_EAV_TYPE_ID), PRIMARY KEY(DOCUMENT_ID, DOCUMENT_EAV_TYPE_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_document_entity (DOCUMENT_ID INT NOT NULL, SITE_ID INT NOT NULL, INDEX FK_N_SITE_DOCUMENT_ENTITY_DOCUMENT (DOCUMENT_ID), INDEX FK_N_SITE_DOCUMENT_ENTITY_SITE (SITE_ID), PRIMARY KEY(DOCUMENT_ID, SITE_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE84352B72F FOREIGN KEY (DOCUMENT_EAV_TYPE_ID) REFERENCES document_eav_type (DOCUMENT_EAV_TYPE_ID)');
        $this->addSql('ALTER TABLE site_document_entity ADD CONSTRAINT FK_BED02BE57671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE site_document_entity ADD CONSTRAINT FK_BED02BE5F1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE document_eav_type_document_entity');
        $this->addSql('DROP TABLE site_document_entity');
    }
}
