<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180802045955 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', parent_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_64C19C1BF396750 (id), UNIQUE INDEX UNIQ_64C19C1989D9B62 (slug), INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_categories (product_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_E8ACBE764584665A (product_id), INDEX IDX_E8ACBE7612469DE2 (category_id), PRIMARY KEY(product_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE764584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE7612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE products_categories DROP FOREIGN KEY FK_E8ACBE7612469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE products_categories');
    }
}
