<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211129153629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rendre le champs phone_number nullable: car le serveur d\'authentification ne retourne pas de numéro de téléphone';
    }

    public function up(Schema $schema): void
    {
      $this->addSql('ALTER TABLE users CHANGE phone_number phone_number VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {

        $this->addSql('ALTER TABLE users CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
