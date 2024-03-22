<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125155756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock ADD etat_id INT DEFAULT NULL, DROP etat');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660D5E86FF ON stock (etat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660D5E86FF');
        $this->addSql('DROP INDEX UNIQ_4B365660D5E86FF ON stock');
        $this->addSql('ALTER TABLE stock ADD etat VARCHAR(255) NOT NULL, DROP etat_id');
    }
}
