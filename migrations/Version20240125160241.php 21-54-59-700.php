<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125160241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX UNIQ_4B365660D5E86FF, ADD INDEX IDX_4B365660D5E86FF (etat_id)');
        $this->addSql('ALTER TABLE stock DROP INDEX UNIQ_4B365660FA0D26FC, ADD INDEX IDX_4B365660FA0D26FC (trondro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX IDX_4B365660FA0D26FC, ADD UNIQUE INDEX UNIQ_4B365660FA0D26FC (trondro_id)');
        $this->addSql('ALTER TABLE stock DROP INDEX IDX_4B365660D5E86FF, ADD UNIQUE INDEX UNIQ_4B365660D5E86FF (etat_id)');
    }
}
