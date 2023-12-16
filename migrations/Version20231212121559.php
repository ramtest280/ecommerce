<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231212121559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE livraison_fournisseur');
        $this->addSql('ALTER TABLE livraison ADD fournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A60C9F1F670C757F ON livraison (fournisseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraison_fournisseur (livraison_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_D1C2143B8E54FB25 (livraison_id), INDEX IDX_D1C2143B670C757F (fournisseur_id), PRIMARY KEY(livraison_id, fournisseur_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE livraison_fournisseur ADD CONSTRAINT FK_D1C2143B670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison_fournisseur ADD CONSTRAINT FK_D1C2143B8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F670C757F');
        $this->addSql('DROP INDEX UNIQ_A60C9F1F670C757F ON livraison');
        $this->addSql('ALTER TABLE livraison DROP fournisseur_id');
    }
}
