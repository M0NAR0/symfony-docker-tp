<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629193857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_eav DROP FOREIGN KEY FK_A777ACD24352B72F');
        $this->addSql('ALTER TABLE document_eav ADD CONSTRAINT FK_A777ACD24352B72F FOREIGN KEY (DOCUMENT_EAV_TYPE_ID) REFERENCES document_eav_type (DOCUMENT_EAV_TYPE_ID) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_eav DROP FOREIGN KEY FK_A777ACD24352B72F');
        $this->addSql('ALTER TABLE document_eav ADD CONSTRAINT FK_A777ACD24352B72F FOREIGN KEY (DOCUMENT_EAV_TYPE_ID) REFERENCES document_eav_type (DOCUMENT_EAV_TYPE_ID)');
    }
}
