<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304212129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture CHANGE id id INT NOT NULL, CHANGE contrat_id contrat_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE portfolio ADD user_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A9ED1062A76ED395 ON portfolio (user_id)');
        $this->addSql('ALTER TABLE review ADD commentaire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD facture_id INT DEFAULT NULL, ADD prix INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D17F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_723705D17F2DEE08 ON transaction (facture_id)');
        $this->addSql('ALTER TABLE user ADD bids INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE contrat_id contrat_id INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE portfolio DROP FOREIGN KEY FK_A9ED1062A76ED395');
        $this->addSql('DROP INDEX IDX_A9ED1062A76ED395 ON portfolio');
        $this->addSql('ALTER TABLE portfolio DROP user_id, DROP title');
        $this->addSql('ALTER TABLE review DROP commentaire');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D17F2DEE08');
        $this->addSql('DROP INDEX UNIQ_723705D17F2DEE08 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP facture_id, DROP prix, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user DROP bids');
    }
}
