<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131174007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compagny_files ADD compagny_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compagny_files ADD CONSTRAINT FK_C7224A7F1224ABE0 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('CREATE INDEX IDX_C7224A7F1224ABE0 ON compagny_files (compagny_id)');
        $this->addSql('ALTER TABLE task ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_527EDB25A76ED395 ON task (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compagny_files DROP FOREIGN KEY FK_C7224A7F1224ABE0');
        $this->addSql('DROP INDEX IDX_C7224A7F1224ABE0 ON compagny_files');
        $this->addSql('ALTER TABLE compagny_files DROP compagny_id');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25A76ED395');
        $this->addSql('DROP INDEX IDX_527EDB25A76ED395 ON task');
        $this->addSql('ALTER TABLE task DROP user_id');
    }
}
