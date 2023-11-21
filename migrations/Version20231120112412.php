<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120112412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dictionary_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dictionary_entry_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dictionary (id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN dictionary.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE dictionary_entry (id INT NOT NULL, dictionary_id INT NOT NULL, value_id INT NOT NULL, value VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CAC92220AF5E5B3C ON dictionary_entry (dictionary_id)');
        $this->addSql('COMMENT ON COLUMN dictionary_entry.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN dictionary_entry.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE dictionary_entry ADD CONSTRAINT FK_CAC92220AF5E5B3C FOREIGN KEY (dictionary_id) REFERENCES dictionary (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE dictionary_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dictionary_entry_id_seq CASCADE');
        $this->addSql('ALTER TABLE dictionary_entry DROP CONSTRAINT FK_CAC92220AF5E5B3C');
        $this->addSql('DROP TABLE dictionary');
        $this->addSql('DROP TABLE dictionary_entry');
    }
}
