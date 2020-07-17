<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200716091155 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('ALTER TABLE eter_game ADD game_pic VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE eter_user CHANGE statut statut TINYINT(1) DEFAULT NULL, CHANGE user_update user_update DATETIME NOT NULL, CHANGE user_role user_role VARCHAR(255) NOT NULL, CHANGE user_desactivate user_desactivate TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label CHANGE eter_label_id eter_label_id INT NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_12e4ee18da4035e0 TO IDX_B0E9CD9CDA4035E0');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_12e4ee18ab2dc4d9 TO IDX_B0E9CD9C13AB846C');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE eter_game DROP game_pic');
        $this->addSql('ALTER TABLE eter_user CHANGE statut statut TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE user_update user_update DATETIME DEFAULT NULL, CHANGE user_role user_role VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'utilisateur\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_desactivate user_desactivate SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label CHANGE eter_label_id eter_label_id INT DEFAULT 2 NOT NULL');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_b0e9cd9c13ab846c TO IDX_12E4EE18AB2DC4D9');
        $this->addSql('ALTER TABLE eter_user_eter_label RENAME INDEX idx_b0e9cd9cda4035e0 TO IDX_12E4EE18DA4035E0');
    }
}
