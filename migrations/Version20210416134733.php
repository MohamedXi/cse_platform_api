<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416134733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agencies (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_types (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE items (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', agency_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', item_type_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', deposit_amount DOUBLE PRECISION DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, rent_price DOUBLE PRECISION NOT NULL, INDEX IDX_E11EE94DCDEADB2A (agency_id), INDEX IDX_E11EE94DCE11AAC7 (item_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_tag (item_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', tag_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_E49CCCB1126F525E (item_id), INDEX IDX_E49CCCB1BAD26311 (tag_id), PRIMARY KEY(item_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rentals (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', item_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', start_date DATE NOT NULL, due_date DATE NOT NULL, end_date DATE DEFAULT NULL, deposit_paid DOUBLE PRECISION DEFAULT NULL, INDEX IDX_35ACDB48A76ED395 (user_id), INDEX IDX_35ACDB48126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', username VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DCDEADB2A FOREIGN KEY (agency_id) REFERENCES agencies (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DCE11AAC7 FOREIGN KEY (item_type_id) REFERENCES item_types (id)');
        $this->addSql('ALTER TABLE item_tag ADD CONSTRAINT FK_E49CCCB1126F525E FOREIGN KEY (item_id) REFERENCES items (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_tag ADD CONSTRAINT FK_E49CCCB1BAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rentals ADD CONSTRAINT FK_35ACDB48A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE rentals ADD CONSTRAINT FK_35ACDB48126F525E FOREIGN KEY (item_id) REFERENCES items (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DCDEADB2A');
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DCE11AAC7');
        $this->addSql('ALTER TABLE item_tag DROP FOREIGN KEY FK_E49CCCB1126F525E');
        $this->addSql('ALTER TABLE rentals DROP FOREIGN KEY FK_35ACDB48126F525E');
        $this->addSql('ALTER TABLE item_tag DROP FOREIGN KEY FK_E49CCCB1BAD26311');
        $this->addSql('ALTER TABLE rentals DROP FOREIGN KEY FK_35ACDB48A76ED395');
        $this->addSql('DROP TABLE agencies');
        $this->addSql('DROP TABLE item_types');
        $this->addSql('DROP TABLE items');
        $this->addSql('DROP TABLE item_tag');
        $this->addSql('DROP TABLE rentals');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE users');
    }
}
