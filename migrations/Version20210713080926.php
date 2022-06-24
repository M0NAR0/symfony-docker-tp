<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713080926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE document_entity_site ADD CONSTRAINT FK_A32687A5F1B5AEBC FOREIGN KEY (SITE_ID) REFERENCES site (SITE_ID)');
        $this->addSql('ALTER TABLE document_entity_site ADD CONSTRAINT FK_A32687A57671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_eav_type_document_entity DROP FOREIGN KEY FK_11057FE87671AC3F');
        $this->addSql('ALTER TABLE document_eav_type_document_entity ADD CONSTRAINT FK_11057FE87671AC3F FOREIGN KEY (DOCUMENT_ID) REFERENCES document_entity (DOCUMENT_ID)');
        $this->addSql('ALTER TABLE document_entity_site DROP FOREIGN KEY FK_A32687A5F1B5AEBC');
        $this->addSql('ALTER TABLE document_entity_site DROP FOREIGN KEY FK_A32687A57671AC3F');
    }
}
