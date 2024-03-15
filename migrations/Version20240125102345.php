<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125102345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX UNIQ_4B365660D28B0F63, ADD INDEX IDX_4B365660D28B0F63 (entana_id)');
        $this->addSql('ALTER TABLE stock DROP INDEX UNIQ_4B365660670C757F, ADD INDEX IDX_4B365660670C757F (fournisseur_id)');
        $this->addSql('ALTER TABLE stock ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP datetime');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX IDX_4B365660D28B0F63, ADD UNIQUE INDEX UNIQ_4B365660D28B0F63 (entana_id)');
        $this->addSql('ALTER TABLE stock DROP INDEX IDX_4B365660670C757F, ADD UNIQUE INDEX UNIQ_4B365660670C757F (fournisseur_id)');
        $this->addSql('ALTER TABLE stock ADD datetime DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', DROP created_at');
    }
}
