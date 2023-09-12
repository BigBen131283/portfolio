<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912164729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_skills (users_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_DAD698E067B3B43D (users_id), INDEX IDX_DAD698E07FF61858 (skills_id), PRIMARY KEY(users_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E07FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A467B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_5C93B3A467B3B43D ON projects (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_skills DROP FOREIGN KEY FK_DAD698E067B3B43D');
        $this->addSql('ALTER TABLE users_skills DROP FOREIGN KEY FK_DAD698E07FF61858');
        $this->addSql('DROP TABLE users_skills');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A467B3B43D');
        $this->addSql('DROP INDEX IDX_5C93B3A467B3B43D ON projects');
        $this->addSql('ALTER TABLE projects DROP users_id');
    }
}