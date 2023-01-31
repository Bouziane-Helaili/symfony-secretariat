<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131173455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_files_user ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE compagny_files ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compagny_files ADD CONSTRAINT FK_C7224A7F12469DE2 FOREIGN KEY (category_id) REFERENCES category_files_user (id)');
        $this->addSql('CREATE INDEX IDX_C7224A7F12469DE2 ON compagny_files (category_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_files_user DROP type');
        $this->addSql('ALTER TABLE compagny_files DROP FOREIGN KEY FK_C7224A7F12469DE2');
        $this->addSql('DROP INDEX IDX_C7224A7F12469DE2 ON compagny_files');
        $this->addSql('ALTER TABLE compagny_files DROP category_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
