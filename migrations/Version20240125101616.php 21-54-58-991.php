<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125101616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660F347EFB');
        $this->addSql('DROP INDEX UNIQ_4B365660F347EFB ON stock');
        $this->addSql('ALTER TABLE stock CHANGE produit_id entana_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660D28B0F63 FOREIGN KEY (entana_id) REFERENCES entana (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660D28B0F63 ON stock (entana_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660D28B0F63');
        $this->addSql('DROP INDEX UNIQ_4B365660D28B0F63 ON stock');
        $this->addSql('ALTER TABLE stock CHANGE entana_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660F347EFB FOREIGN KEY (produit_id) REFERENCES entana (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660F347EFB ON stock (produit_id)');
    }
}
