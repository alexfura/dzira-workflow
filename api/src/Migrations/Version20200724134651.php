<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200724134651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE state_transition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dzhira_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE issue_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE state_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE state_transition (id INT NOT NULL, from_state_id INT DEFAULT NULL, to_state_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B28276EA4337DC5B ON state_transition (from_state_id)');
        $this->addSql('CREATE INDEX IDX_B28276EAC881A26F ON state_transition (to_state_id)');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, issue_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C5E7AA58C ON comment (issue_id)');
        $this->addSql('CREATE TABLE dzhira_user (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EC359599E7927C74 ON dzhira_user (email)');
        $this->addSql('CREATE TABLE issue (id INT NOT NULL, user_id INT DEFAULT NULL, state_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, content VARCHAR(255) NOT NULL, estimation_time VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_12AD233EA76ED395 ON issue (user_id)');
        $this->addSql('CREATE INDEX IDX_12AD233E5D83CC1 ON issue (state_id)');
        $this->addSql('COMMENT ON COLUMN issue.estimation_time IS \'(DC2Type:dateinterval)\'');
        $this->addSql('CREATE TABLE issues (issue_id INT NOT NULL, parent_issue_id INT NOT NULL, PRIMARY KEY(issue_id, parent_issue_id))');
        $this->addSql('CREATE INDEX IDX_DA7D7F835E7AA58C ON issues (issue_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F83C1B7095D ON issues (parent_issue_id)');
        $this->addSql('CREATE TABLE state (id INT NOT NULL, title TEXT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT FK_B28276EA4337DC5B FOREIGN KEY (from_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE state_transition ADD CONSTRAINT FK_B28276EAC881A26F FOREIGN KEY (to_state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5E7AA58C FOREIGN KEY (issue_id) REFERENCES issue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233EA76ED395 FOREIGN KEY (user_id) REFERENCES dzhira_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E5D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F835E7AA58C FOREIGN KEY (issue_id) REFERENCES issue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83C1B7095D FOREIGN KEY (parent_issue_id) REFERENCES issue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE issue DROP CONSTRAINT FK_12AD233EA76ED395');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C5E7AA58C');
        $this->addSql('ALTER TABLE issues DROP CONSTRAINT FK_DA7D7F835E7AA58C');
        $this->addSql('ALTER TABLE issues DROP CONSTRAINT FK_DA7D7F83C1B7095D');
        $this->addSql('ALTER TABLE state_transition DROP CONSTRAINT FK_B28276EA4337DC5B');
        $this->addSql('ALTER TABLE state_transition DROP CONSTRAINT FK_B28276EAC881A26F');
        $this->addSql('ALTER TABLE issue DROP CONSTRAINT FK_12AD233E5D83CC1');
        $this->addSql('DROP SEQUENCE state_transition_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dzhira_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE issue_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE state_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE state_transition');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE dzhira_user');
        $this->addSql('DROP TABLE issue');
        $this->addSql('DROP TABLE issues');
        $this->addSql('DROP TABLE state');
    }
}
