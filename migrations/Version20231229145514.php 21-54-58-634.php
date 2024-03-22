<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229145514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery DROP INDEX UNIQ_3781EC10670C757F, ADD INDEX IDX_3781EC10670C757F (fournisseur_id)');
        $this->addSql('ALTER TABLE delivery DROP INDEX UNIQ_3781EC10D28B0F63, ADD INDEX IDX_3781EC10D28B0F63 (entana_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery DROP INDEX IDX_3781EC10D28B0F63, ADD UNIQUE INDEX UNIQ_3781EC10D28B0F63 (entana_id)');
        $this->addSql('ALTER TABLE delivery DROP INDEX IDX_3781EC10670C757F, ADD UNIQUE INDEX UNIQ_3781EC10670C757F (fournisseur_id)');
    }
}
