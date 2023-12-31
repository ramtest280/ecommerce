<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231016120228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, sofera VARCHAR(255) NOT NULL, entana INT NOT NULL, frais INT NOT NULL, permis TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison_fournisseur (livraison_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_D1C2143B8E54FB25 (livraison_id), INDEX IDX_D1C2143B670C757F (fournisseur_id), PRIMARY KEY(livraison_id, fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison_fournisseur ADD CONSTRAINT FK_D1C2143B8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_fournisseur ADD CONSTRAINT FK_D1C2143B670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_fournisseur DROP FOREIGN KEY FK_D1C2143B670C757F');
        $this->addSql('ALTER TABLE livraison_fournisseur DROP FOREIGN KEY FK_D1C2143B8E54FB25');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livraison_fournisseur');
    }
}
