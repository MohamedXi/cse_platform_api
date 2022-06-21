<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Psr\Log\LoggerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 *
 *
 * Add functions to mariaddb to DECODE/ENCODE UUID
 *
 * Usage :
 * SELECT * FROM `table_with_UUID` WHERE id = UUID_TO_BIN("xxxxx-xxxx-xxxxx-xxxxxxxxx")
 * SELECT BIN_TO_UUID(id) FROM `table_with_UUID`
 */
final class Version0000000000001 extends AbstractMigration
{

    /**
     * @var Connection|null
     */
    private ?Connection $conn;


    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        parent::__construct($connection, $logger);
        $this->conn = $connection;
    }

    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('
            CREATE FUNCTION IF NOT EXISTS BIN_TO_UUID(b BINARY(16))
            RETURNS CHAR(36)
            BEGIN
               DECLARE hexStr CHAR(32);
               SET hexStr = HEX(b);
               RETURN LOWER(CONCAT(
                    SUBSTR(hexStr, 1, 8), \'-\',
                    SUBSTR(hexStr, 9, 4), \'-\',
                    SUBSTR(hexStr, 13, 4), \'-\',
                    SUBSTR(hexStr, 17, 4), \'-\',
                    SUBSTR(hexStr, 21)
                ));
            END;'
        );

        $q = $this->conn->executeQuery("
             CREATE FUNCTION IF NOT EXISTS UUID_TO_BIN(uuid CHAR(36))
                RETURNS BINARY(16) DETERMINISTIC
                BEGIN
                  RETURN UNHEX(CONCAT(REPLACE(uuid, '-', '')));
                END;
            ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
