<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614195503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1D10B9A56');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1D10B9A56 FOREIGN KEY (ROLE_ID) REFERENCES role (ROLE_ID) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1D10B9A56');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1D10B9A56 FOREIGN KEY (ROLE_ID) REFERENCES role (ROLE_ID)');
    }
}
