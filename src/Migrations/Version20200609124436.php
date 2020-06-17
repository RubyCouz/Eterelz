<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609124436 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eter_user ADD user_order_date DATETIME DEFAULT NULL, CHANGE statut statut TINYINT(1) DEFAULT NULL, CHANGE user_update user_update DATETIME NOT NULL, CHANGE user_role user_role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label CHANGE eter_label_id eter_label_id INT NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_12e4ee18da4035e0 TO IDX_B0E9CD9CDA4035E0');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_12e4ee18ab2dc4d9 TO IDX_B0E9CD9C13AB846C');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eter_user DROP user_order_date, CHANGE statut statut TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE user_update user_update DATETIME DEFAULT NULL, CHANGE user_role user_role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'utilisateur\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE eter_user_eter_label CHANGE eter_label_id eter_label_id INT DEFAULT 2 NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_b0e9cd9cda4035e0 TO IDX_12E4EE18DA4035E0');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_b0e9cd9c13ab846c TO IDX_12E4EE18AB2DC4D9');
    }
}
