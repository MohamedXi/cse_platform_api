<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210426141112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items ADD end_date_available DATE DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE rentals ADD give_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD restitution_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD deposit_returned TINYINT(1) DEFAULT NULL, ADD item_degraded TINYINT(1) DEFAULT NULL, ADD comment VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE rentals ADD CONSTRAINT FK_35ACDB482DDD6EE FOREIGN KEY (give_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE rentals ADD CONSTRAINT FK_35ACDB48B3FF1D16 FOREIGN KEY (restitution_by_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_35ACDB482DDD6EE ON rentals (give_by_id)');
        $this->addSql('CREATE INDEX IDX_35ACDB48B3FF1D16 ON rentals (restitution_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items DROP end_date_available, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE rentals DROP FOREIGN KEY FK_35ACDB482DDD6EE');
        $this->addSql('ALTER TABLE rentals DROP FOREIGN KEY FK_35ACDB48B3FF1D16');
        $this->addSql('DROP INDEX IDX_35ACDB482DDD6EE ON rentals');
        $this->addSql('DROP INDEX IDX_35ACDB48B3FF1D16 ON rentals');
        $this->addSql('ALTER TABLE rentals DROP give_by_id, DROP restitution_by_id, DROP deposit_returned, DROP item_degraded, DROP comment');
    }
}
