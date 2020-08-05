<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805173719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE state_transition (previous_state_id INT NOT NULL, next_state_id INT NOT NULL, PRIMARY KEY(previous_state_id, next_state_id))');
        $this->addSql('CREATE INDEX IDX_B28276EA1A3324C5 ON state_transition (previous_state_id)');
        $this->addSql('CREATE INDEX IDX_B28276EA3DC2702F ON state_transition (next_state_id)');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT FK_B28276EA1A3324C5 FOREIGN KEY (previous_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT FK_B28276EA3DC2702F FOREIGN KEY (next_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE state_transition');
    }
}
