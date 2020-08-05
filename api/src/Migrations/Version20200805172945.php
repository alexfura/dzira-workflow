<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805172945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE state_transition_id_seq CASCADE');
        $this->addSql('DROP TABLE state_transition');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE state_transition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE state_transition (id INT NOT NULL, from_state_id INT DEFAULT NULL, to_state_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b28276ea4337dc5b ON state_transition (from_state_id)');
        $this->addSql('CREATE INDEX idx_b28276eac881a26f ON state_transition (to_state_id)');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT fk_b28276ea4337dc5b FOREIGN KEY (from_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT fk_b28276eac881a26f FOREIGN KEY (to_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
