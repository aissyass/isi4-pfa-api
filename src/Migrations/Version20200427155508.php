<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200427155508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classwork (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classwork_type (id INT AUTO_INCREMENT NOT NULL, classwork_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_EF1368218D5BF6E0 (classwork_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, classwork_id INT DEFAULT NULL, post_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_729F519B8D5BF6E0 (classwork_id), INDEX IDX_729F519B4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_user_room (room_user_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_94B7FD3B4B4C6F75 (room_user_id), INDEX IDX_94B7FD3B54177093 (room_id), PRIMARY KEY(room_user_id, room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_user_user (room_user_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6BBB7AE94B4C6F75 (room_user_id), INDEX IDX_6BBB7AE9A76ED395 (user_id), PRIMARY KEY(room_user_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uploaded_file (id INT AUTO_INCREMENT NOT NULL, post_id_id INT DEFAULT NULL, classwork_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, extension VARCHAR(50) NOT NULL, size INT NOT NULL, UNIQUE INDEX UNIQ_B40DF75DE85F12B8 (post_id_id), UNIQUE INDEX UNIQ_B40DF75D71FCDB5A (classwork_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, classwork_id INT DEFAULT NULL, post_id INT DEFAULT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, sexe VARCHAR(50) NOT NULL, phone VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8D93D64954177093 (room_id), INDEX IDX_8D93D6498D5BF6E0 (classwork_id), INDEX IDX_8D93D6494B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classwork_type ADD CONSTRAINT FK_EF1368218D5BF6E0 FOREIGN KEY (classwork_id) REFERENCES classwork (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B8D5BF6E0 FOREIGN KEY (classwork_id) REFERENCES classwork (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE room_user_room ADD CONSTRAINT FK_94B7FD3B4B4C6F75 FOREIGN KEY (room_user_id) REFERENCES room_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_user_room ADD CONSTRAINT FK_94B7FD3B54177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_user_user ADD CONSTRAINT FK_6BBB7AE94B4C6F75 FOREIGN KEY (room_user_id) REFERENCES room_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_user_user ADD CONSTRAINT FK_6BBB7AE9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE uploaded_file ADD CONSTRAINT FK_B40DF75DE85F12B8 FOREIGN KEY (post_id_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE uploaded_file ADD CONSTRAINT FK_B40DF75D71FCDB5A FOREIGN KEY (classwork_id_id) REFERENCES classwork (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64954177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498D5BF6E0 FOREIGN KEY (classwork_id) REFERENCES classwork (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE classwork_type DROP FOREIGN KEY FK_EF1368218D5BF6E0');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B8D5BF6E0');
        $this->addSql('ALTER TABLE uploaded_file DROP FOREIGN KEY FK_B40DF75D71FCDB5A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498D5BF6E0');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B4B89032C');
        $this->addSql('ALTER TABLE uploaded_file DROP FOREIGN KEY FK_B40DF75DE85F12B8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B89032C');
        $this->addSql('ALTER TABLE room_user_room DROP FOREIGN KEY FK_94B7FD3B54177093');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64954177093');
        $this->addSql('ALTER TABLE room_user_room DROP FOREIGN KEY FK_94B7FD3B4B4C6F75');
        $this->addSql('ALTER TABLE room_user_user DROP FOREIGN KEY FK_6BBB7AE94B4C6F75');
        $this->addSql('ALTER TABLE room_user_user DROP FOREIGN KEY FK_6BBB7AE9A76ED395');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3A76ED395');
        $this->addSql('DROP TABLE classwork');
        $this->addSql('DROP TABLE classwork_type');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_user');
        $this->addSql('DROP TABLE room_user_room');
        $this->addSql('DROP TABLE room_user_user');
        $this->addSql('DROP TABLE uploaded_file');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_role');
    }
}
