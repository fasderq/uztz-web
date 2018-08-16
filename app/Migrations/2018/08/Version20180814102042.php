<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180814102042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE machine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE machine (id INT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category_machines (category_id INT NOT NULL, machine_id INT NOT NULL, PRIMARY KEY(category_id, machine_id))');
        $this->addSql('CREATE INDEX IDX_46B4099612469DE2 ON category_machines (category_id)');
        $this->addSql('CREATE INDEX IDX_46B40996F6B75B26 ON category_machines (machine_id)');
        $this->addSql('ALTER TABLE category_machines ADD CONSTRAINT FK_46B4099612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_machines ADD CONSTRAINT FK_46B40996F6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category_machines DROP CONSTRAINT FK_46B40996F6B75B26');
        $this->addSql('DROP SEQUENCE machine_id_seq CASCADE');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE category_machines');
    }
}
