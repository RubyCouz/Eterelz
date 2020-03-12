<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312153002 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eter_game (id INT AUTO_INCREMENT NOT NULL, game_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_game_eter_gender (eter_game_id INT NOT NULL, eter_gender_id INT NOT NULL, INDEX IDX_E7DF7A6D99A13F70 (eter_game_id), INDEX IDX_E7DF7A6D1C291730 (eter_gender_id), PRIMARY KEY(eter_game_id, eter_gender_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_gender (id INT AUTO_INCREMENT NOT NULL, gender_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_user_eter_game (eter_user_id INT NOT NULL, eter_game_id INT NOT NULL, INDEX IDX_66A655FEDA4035E0 (eter_user_id), INDEX IDX_66A655FE99A13F70 (eter_game_id), PRIMARY KEY(eter_user_id, eter_game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eter_game_eter_gender ADD CONSTRAINT FK_E7DF7A6D99A13F70 FOREIGN KEY (eter_game_id) REFERENCES eter_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_game_eter_gender ADD CONSTRAINT FK_E7DF7A6D1C291730 FOREIGN KEY (eter_gender_id) REFERENCES eter_gender (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_user_eter_game ADD CONSTRAINT FK_66A655FEDA4035E0 FOREIGN KEY (eter_user_id) REFERENCES eter_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_user_eter_game ADD CONSTRAINT FK_66A655FE99A13F70 FOREIGN KEY (eter_game_id) REFERENCES eter_game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eter_game_eter_gender DROP FOREIGN KEY FK_E7DF7A6D99A13F70');
        $this->addSql('ALTER TABLE eter_user_eter_game DROP FOREIGN KEY FK_66A655FE99A13F70');
        $this->addSql('ALTER TABLE eter_game_eter_gender DROP FOREIGN KEY FK_E7DF7A6D1C291730');
        $this->addSql('DROP TABLE eter_game');
        $this->addSql('DROP TABLE eter_game_eter_gender');
        $this->addSql('DROP TABLE eter_gender');
        $this->addSql('DROP TABLE eter_user_eter_game');
    }
}
