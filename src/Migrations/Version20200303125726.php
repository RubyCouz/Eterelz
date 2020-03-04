<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200303125726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eter_affiliation (id INT AUTO_INCREMENT NOT NULL, clan_id_id INT NOT NULL, aff_date DATE NOT NULL, INDEX IDX_3E4FED21E07BE140 (clan_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_answer (id INT AUTO_INCREMENT NOT NULL, comment_id_id INT NOT NULL, comment_id_1_id INT NOT NULL, answer_date DATETIME NOT NULL, INDEX IDX_F3A58EAAD6DE06A6 (comment_id_id), INDEX IDX_F3A58EAA888022E8 (comment_id_1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_categorie (id INT AUTO_INCREMENT NOT NULL, cat_id_name_id INT NOT NULL, cat_name VARCHAR(50) NOT NULL, INDEX IDX_525C61E472681E57 (cat_id_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_clan (id INT AUTO_INCREMENT NOT NULL, clan_name VARCHAR(100) NOT NULL, clan_members INT NOT NULL, clan_desc LONGTEXT NOT NULL, clan_ban VARCHAR(5) DEFAULT NULL, clan_discord VARCHAR(150) DEFAULT NULL, clan_recrut TINYINT(1) NOT NULL, clan_activity TINYINT(1) NOT NULL, clan_gameplay TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_comment (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, content_id_id INT NOT NULL, comment_content LONGTEXT NOT NULL, comment_date DATETIME NOT NULL, INDEX IDX_E95AB4199D86650F (user_id_id), INDEX IDX_E95AB4199487CA85 (content_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_content (id INT AUTO_INCREMENT NOT NULL, statut_id_id INT NOT NULL, cat_id_id INT NOT NULL, user_id_id INT NOT NULL, content_text LONGTEXT NOT NULL, content_date DATETIME NOT NULL, content_extension VARCHAR(5) DEFAULT NULL, INDEX IDX_83EBD6DC4DB9F129 (statut_id_id), INDEX IDX_83EBD6DCC33F2EBA (cat_id_id), INDEX IDX_83EBD6DC9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_contribution (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, event_id_id INT NOT NULL, INDEX IDX_8051031F9D86650F (user_id_id), INDEX IDX_8051031F3E5F2F7B (event_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_event (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, event_date DATETIME NOT NULL, event_score VARCHAR(50) DEFAULT NULL, event_winner VARCHAR(50) DEFAULT NULL, event_creation DATETIME NOT NULL, INDEX IDX_9AA31DDE9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_game (id INT AUTO_INCREMENT NOT NULL, game_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_own (id INT AUTO_INCREMENT NOT NULL, game_id_id INT NOT NULL, type_id_id INT NOT NULL, INDEX IDX_24B4984F4D77E7D8 (game_id_id), INDEX IDX_24B4984F714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_participation (id INT AUTO_INCREMENT NOT NULL, clan_id_id INT NOT NULL, event_id_id INT NOT NULL, INDEX IDX_4BEA6F4CE07BE140 (clan_id_id), INDEX IDX_4BEA6F4C3E5F2F7B (event_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_play (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, game_id_id INT NOT NULL, INDEX IDX_820DD91B9D86650F (user_id_id), INDEX IDX_820DD91B4D77E7D8 (game_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_role (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_statut (id INT AUTO_INCREMENT NOT NULL, statut_state VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_streamer (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, stream_url VARCHAR(150) NOT NULL, stream_support VARCHAR(50) NOT NULL, INDEX IDX_DE405679D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_type (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_user (id INT AUTO_INCREMENT NOT NULL, user_login VARCHAR(50) NOT NULL, user_date DATE NOT NULL, user_mail VARCHAR(150) NOT NULL, user_password VARCHAR(150) NOT NULL, user_address VARCHAR(150) DEFAULT NULL, user_zip VARCHAR(5) DEFAULT NULL, user_city VARCHAR(50) DEFAULT NULL, user_discord VARCHAR(150) DEFAULT NULL, user_sexe VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eter_affiliation ADD CONSTRAINT FK_3E4FED21E07BE140 FOREIGN KEY (clan_id_id) REFERENCES eter_clan (id)');
        $this->addSql('ALTER TABLE eter_answer ADD CONSTRAINT FK_F3A58EAAD6DE06A6 FOREIGN KEY (comment_id_id) REFERENCES eter_comment (id)');
        $this->addSql('ALTER TABLE eter_answer ADD CONSTRAINT FK_F3A58EAA888022E8 FOREIGN KEY (comment_id_1_id) REFERENCES eter_comment (id)');
        $this->addSql('ALTER TABLE eter_categorie ADD CONSTRAINT FK_525C61E472681E57 FOREIGN KEY (cat_id_name_id) REFERENCES eter_categorie (id)');
        $this->addSql('ALTER TABLE eter_comment ADD CONSTRAINT FK_E95AB4199D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
        $this->addSql('ALTER TABLE eter_comment ADD CONSTRAINT FK_E95AB4199487CA85 FOREIGN KEY (content_id_id) REFERENCES eter_content (id)');
        $this->addSql('ALTER TABLE eter_content ADD CONSTRAINT FK_83EBD6DC4DB9F129 FOREIGN KEY (statut_id_id) REFERENCES eter_statut (id)');
        $this->addSql('ALTER TABLE eter_content ADD CONSTRAINT FK_83EBD6DCC33F2EBA FOREIGN KEY (cat_id_id) REFERENCES eter_categorie (id)');
        $this->addSql('ALTER TABLE eter_content ADD CONSTRAINT FK_83EBD6DC9D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
        $this->addSql('ALTER TABLE eter_contribution ADD CONSTRAINT FK_8051031F9D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
        $this->addSql('ALTER TABLE eter_contribution ADD CONSTRAINT FK_8051031F3E5F2F7B FOREIGN KEY (event_id_id) REFERENCES eter_event (id)');
        $this->addSql('ALTER TABLE eter_event ADD CONSTRAINT FK_9AA31DDE9D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
        $this->addSql('ALTER TABLE eter_own ADD CONSTRAINT FK_24B4984F4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES eter_game (id)');
        $this->addSql('ALTER TABLE eter_own ADD CONSTRAINT FK_24B4984F714819A0 FOREIGN KEY (type_id_id) REFERENCES eter_type (id)');
        $this->addSql('ALTER TABLE eter_participation ADD CONSTRAINT FK_4BEA6F4CE07BE140 FOREIGN KEY (clan_id_id) REFERENCES eter_clan (id)');
        $this->addSql('ALTER TABLE eter_participation ADD CONSTRAINT FK_4BEA6F4C3E5F2F7B FOREIGN KEY (event_id_id) REFERENCES eter_event (id)');
        $this->addSql('ALTER TABLE eter_play ADD CONSTRAINT FK_820DD91B9D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
        $this->addSql('ALTER TABLE eter_play ADD CONSTRAINT FK_820DD91B4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES eter_game (id)');
        $this->addSql('ALTER TABLE eter_streamer ADD CONSTRAINT FK_DE405679D86650F FOREIGN KEY (user_id_id) REFERENCES eter_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eter_categorie DROP FOREIGN KEY FK_525C61E472681E57');
        $this->addSql('ALTER TABLE eter_content DROP FOREIGN KEY FK_83EBD6DCC33F2EBA');
        $this->addSql('ALTER TABLE eter_affiliation DROP FOREIGN KEY FK_3E4FED21E07BE140');
        $this->addSql('ALTER TABLE eter_participation DROP FOREIGN KEY FK_4BEA6F4CE07BE140');
        $this->addSql('ALTER TABLE eter_answer DROP FOREIGN KEY FK_F3A58EAAD6DE06A6');
        $this->addSql('ALTER TABLE eter_answer DROP FOREIGN KEY FK_F3A58EAA888022E8');
        $this->addSql('ALTER TABLE eter_comment DROP FOREIGN KEY FK_E95AB4199487CA85');
        $this->addSql('ALTER TABLE eter_contribution DROP FOREIGN KEY FK_8051031F3E5F2F7B');
        $this->addSql('ALTER TABLE eter_participation DROP FOREIGN KEY FK_4BEA6F4C3E5F2F7B');
        $this->addSql('ALTER TABLE eter_own DROP FOREIGN KEY FK_24B4984F4D77E7D8');
        $this->addSql('ALTER TABLE eter_play DROP FOREIGN KEY FK_820DD91B4D77E7D8');
        $this->addSql('ALTER TABLE eter_content DROP FOREIGN KEY FK_83EBD6DC4DB9F129');
        $this->addSql('ALTER TABLE eter_own DROP FOREIGN KEY FK_24B4984F714819A0');
        $this->addSql('ALTER TABLE eter_comment DROP FOREIGN KEY FK_E95AB4199D86650F');
        $this->addSql('ALTER TABLE eter_content DROP FOREIGN KEY FK_83EBD6DC9D86650F');
        $this->addSql('ALTER TABLE eter_contribution DROP FOREIGN KEY FK_8051031F9D86650F');
        $this->addSql('ALTER TABLE eter_event DROP FOREIGN KEY FK_9AA31DDE9D86650F');
        $this->addSql('ALTER TABLE eter_play DROP FOREIGN KEY FK_820DD91B9D86650F');
        $this->addSql('ALTER TABLE eter_streamer DROP FOREIGN KEY FK_DE405679D86650F');
        $this->addSql('DROP TABLE eter_affiliation');
        $this->addSql('DROP TABLE eter_answer');
        $this->addSql('DROP TABLE eter_categorie');
        $this->addSql('DROP TABLE eter_clan');
        $this->addSql('DROP TABLE eter_comment');
        $this->addSql('DROP TABLE eter_content');
        $this->addSql('DROP TABLE eter_contribution');
        $this->addSql('DROP TABLE eter_event');
        $this->addSql('DROP TABLE eter_game');
        $this->addSql('DROP TABLE eter_own');
        $this->addSql('DROP TABLE eter_participation');
        $this->addSql('DROP TABLE eter_play');
        $this->addSql('DROP TABLE eter_role');
        $this->addSql('DROP TABLE eter_statut');
        $this->addSql('DROP TABLE eter_streamer');
        $this->addSql('DROP TABLE eter_type');
        $this->addSql('DROP TABLE eter_user');
    }
}
