<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229152640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE delivery');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, entana_id INT NOT NULL, fournisseur_id INT NOT NULL, livreur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', permis VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, frais INT NOT NULL, colis INT NOT NULL, INDEX IDX_3781EC10D28B0F63 (entana_id), INDEX IDX_3781EC10670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC10D28B0F63 FOREIGN KEY (entana_id) REFERENCES entana (id)');
    }
}
