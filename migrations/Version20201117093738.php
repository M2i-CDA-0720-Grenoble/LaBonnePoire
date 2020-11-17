<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201117093738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_categories (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, INDEX IDX_1638D5A5A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sub_categories ADD CONSTRAINT FK_1638D5A5A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE advert ADD sub_categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B6DBFD369 FOREIGN KEY (sub_categories_id) REFERENCES sub_categories (id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B6DBFD369 ON advert (sub_categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_categories DROP FOREIGN KEY FK_1638D5A5A21214B7');
        $this->addSql('ALTER TABLE advert DROP FOREIGN KEY FK_54F1F40B6DBFD369');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE sub_categories');
        $this->addSql('DROP INDEX IDX_54F1F40B6DBFD369 ON advert');
        $this->addSql('ALTER TABLE advert DROP sub_categories_id');
    }
}
