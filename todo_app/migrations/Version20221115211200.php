<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115211200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE todo (id INT AUTO_INCREMENT NOT NULL, belongs_to_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, important TINYINT(1) DEFAULT NULL, due_to DATE DEFAULT NULL, done TINYINT(1) NOT NULL, INDEX IDX_5A0EB6A033C857F5 (belongs_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE todo ADD CONSTRAINT FK_5A0EB6A033C857F5 FOREIGN KEY (belongs_to_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE todo_old DROP FOREIGN KEY FK_5A0EB6A033C857F5');
        $this->addSql('DROP TABLE todo_old');
        $this->addSql('DROP TABLE user_old');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE todo_old (id INT AUTO_INCREMENT NOT NULL, belongs_to_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, important TINYINT(1) DEFAULT NULL, due_to DATE DEFAULT NULL, INDEX IDX_5A0EB6A033C857F5 (belongs_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_old (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE todo_old ADD CONSTRAINT FK_5A0EB6A033C857F5 FOREIGN KEY (belongs_to_id) REFERENCES user_old (id)');
        $this->addSql('ALTER TABLE todo DROP FOREIGN KEY FK_5A0EB6A033C857F5');
        $this->addSql('DROP TABLE todo');
        $this->addSql('DROP TABLE user');
    }
}
