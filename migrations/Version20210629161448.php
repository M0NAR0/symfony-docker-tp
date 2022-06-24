<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629161448 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E426DB17FB');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E426DB17FB FOREIGN KEY (CUSTOMER_ID) REFERENCES customer (CUSTOMER_ID) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E426DB17FB');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E426DB17FB FOREIGN KEY (CUSTOMER_ID) REFERENCES customer (CUSTOMER_ID)');
    }
}
