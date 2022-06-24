<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703121813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D7973394D2554 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employee (EMPLOYEE_ID)');
        //$this->addSql('ALTER TABLE demand RENAME INDEX idx_428d79736a36624a TO IDX_428D797340253CC1');
        //$this->addSql('ALTER TABLE demand RENAME INDEX idx_428d7973a76ed395 TO IDX_428D7973394D2554');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D7973394D2554');
        //$this->addSql('ALTER TABLE demand RENAME INDEX idx_428d7973394d2554 TO IDX_428D7973A76ED395');
        //$this->addSql('ALTER TABLE demand RENAME INDEX idx_428d797340253cc1 TO IDX_428D79736A36624A');
    }
}
