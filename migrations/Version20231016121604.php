<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016121604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trondro (id INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entana ADD trondro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entana ADD CONSTRAINT FK_A37A775DFA0D26FC FOREIGN KEY (trondro_id) REFERENCES trondro (id)');
        $this->addSql('CREATE INDEX IDX_A37A775DFA0D26FC ON entana (trondro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entana DROP FOREIGN KEY FK_A37A775DFA0D26FC');
        $this->addSql('DROP TABLE trondro');
        $this->addSql('DROP INDEX IDX_A37A775DFA0D26FC ON entana');
        $this->addSql('ALTER TABLE entana DROP trondro_id');
    }
}
