<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125090255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery DROP INDEX IDX_3781EC10FA0D26FC, ADD UNIQUE INDEX UNIQ_3781EC10FA0D26FC (trondro_id)');
        $this->addSql('ALTER TABLE delivery CHANGE trondro_id trondro_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery DROP INDEX UNIQ_3781EC10FA0D26FC, ADD INDEX IDX_3781EC10FA0D26FC (trondro_id)');
        $this->addSql('ALTER TABLE delivery CHANGE trondro_id trondro_id INT DEFAULT NULL');
    }
}
