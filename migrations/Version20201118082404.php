<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118082404 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB4059D86650F');
        $this->addSql('DROP INDEX UNIQ_D95AB4059D86650F ON user_profile');
        $this->addSql('ALTER TABLE user_profile CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB405A76ED395 ON user_profile (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405A76ED395');
        $this->addSql('DROP INDEX UNIQ_D95AB405A76ED395 ON user_profile');
        $this->addSql('ALTER TABLE user_profile CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB4059D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB4059D86650F ON user_profile (user_id_id)');
    }
}
