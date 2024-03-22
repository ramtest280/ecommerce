<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209171643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock ADD paiement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656602A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('CREATE INDEX IDX_4B3656602A4C4478 ON stock (paiement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B3656602A4C4478');
        $this->addSql('DROP INDEX IDX_4B3656602A4C4478 ON stock');
        $this->addSql('ALTER TABLE stock DROP paiement_id');
    }
}
