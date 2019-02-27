<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180725095557 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5EA853F7');
        $this->addSql('CREATE TABLE meeting (id INT AUTO_INCREMENT NOT NULL, id_client INT DEFAULT NULL, id_coiffeur INT DEFAULT NULL, id_card INT DEFAULT NULL, date DATE NOT NULL, heure LONGTEXT NOT NULL, INDEX IDX_F515E139E173B1B8 (id_client), INDEX IDX_F515E13993F84860 (id_coiffeur), INDEX IDX_F515E1399D3484D1 (id_card), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E139E173B1B8 FOREIGN KEY (id_client) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E13993F84860 FOREIGN KEY (id_coiffeur) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E1399D3484D1 FOREIGN KEY (id_card) REFERENCES carte (id)');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE options');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, id_options INT DEFAULT NULL, message TEXT NOT NULL COLLATE utf8_unicode_ci, prix INT NOT NULL, INDEX options_fk (id_options), INDEX user_fk (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL COLLATE utf8_unicode_ci, categorie LONGTEXT NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E56B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5EA853F7 FOREIGN KEY (id_options) REFERENCES options (id)');
        $this->addSql('DROP TABLE meeting');
    }
}
