<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125104400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660D28B0F63');
        $this->addSql('DROP INDEX IDX_4B365660D28B0F63 ON stock');
        $this->addSql('ALTER TABLE stock CHANGE poids poids VARCHAR(255) NOT NULL, CHANGE entana_id trondro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660FA0D26FC FOREIGN KEY (trondro_id) REFERENCES trondro (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660FA0D26FC ON stock (trondro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660FA0D26FC');
        $this->addSql('DROP INDEX UNIQ_4B365660FA0D26FC ON stock');
        $this->addSql('ALTER TABLE stock CHANGE poids poids INT NOT NULL, CHANGE trondro_id entana_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660D28B0F63 FOREIGN KEY (entana_id) REFERENCES entana (id)');
        $this->addSql('CREATE INDEX IDX_4B365660D28B0F63 ON stock (entana_id)');
    }
}
