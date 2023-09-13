<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913161707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_skills (id INT AUTO_INCREMENT NOT NULL, language_id INT DEFAULT NULL, users_id INT DEFAULT NULL, mastery VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B0630D4D82F1BAF4 (language_id), INDEX IDX_B0630D4D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_skills (users_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_DAD698E067B3B43D (users_id), INDEX IDX_DAD698E07FF61858 (skills_id), PRIMARY KEY(users_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4D82F1BAF4 FOREIGN KEY (language_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE user_skills ADD CONSTRAINT FK_B0630D4D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E07FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4D82F1BAF4');
        $this->addSql('ALTER TABLE user_skills DROP FOREIGN KEY FK_B0630D4D67B3B43D');
        $this->addSql('ALTER TABLE users_skills DROP FOREIGN KEY FK_DAD698E067B3B43D');
        $this->addSql('ALTER TABLE users_skills DROP FOREIGN KEY FK_DAD698E07FF61858');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user_skills');
        $this->addSql('DROP TABLE users_skills');
    }
}
