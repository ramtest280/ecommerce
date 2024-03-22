<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229153058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, trondro_id INT DEFAULT NULL, fournisseur_id INT DEFAULT NULL, livreur VARCHAR(255) NOT NULL, permis VARCHAR(255) NOT NULL, colis INT NOT NULL, INDEX IDX_3781EC10FA0D26FC (trondro_id), UNIQUE INDEX UNIQ_3781EC10670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elivery (id INT AUTO_INCREMENT NOT NULL, frais INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10FA0D26FC FOREIGN KEY (trondro_id) REFERENCES trondro (id)');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE elivery');
    }
}
