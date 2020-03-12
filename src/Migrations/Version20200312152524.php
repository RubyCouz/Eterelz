<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312152524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eter_clan_eter_gameplay (eter_clan_id INT NOT NULL, eter_gameplay_id INT NOT NULL, INDEX IDX_2A61BC6EC38162BD (eter_clan_id), INDEX IDX_2A61BC6E756CDFE7 (eter_gameplay_id), PRIMARY KEY(eter_clan_id, eter_gameplay_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eter_user_eter_clan (eter_user_id INT NOT NULL, eter_clan_id INT NOT NULL, INDEX IDX_DA7BC77EDA4035E0 (eter_user_id), INDEX IDX_DA7BC77EC38162BD (eter_clan_id), PRIMARY KEY(eter_user_id, eter_clan_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eter_clan_eter_gameplay ADD CONSTRAINT FK_2A61BC6EC38162BD FOREIGN KEY (eter_clan_id) REFERENCES eter_clan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_clan_eter_gameplay ADD CONSTRAINT FK_2A61BC6E756CDFE7 FOREIGN KEY (eter_gameplay_id) REFERENCES eter_gameplay (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_user_eter_clan ADD CONSTRAINT FK_DA7BC77EDA4035E0 FOREIGN KEY (eter_user_id) REFERENCES eter_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eter_user_eter_clan ADD CONSTRAINT FK_DA7BC77EC38162BD FOREIGN KEY (eter_clan_id) REFERENCES eter_clan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE eter_clan_eter_gameplay');
        $this->addSql('DROP TABLE eter_user_eter_clan');
    }
}
