<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426133215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, rating DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, contact_information VARCHAR(255) NOT NULL, website VARCHAR(150) NOT NULL, star_category INT NOT NULL, check_in_date DATETIME NOT NULL, check_out_date DATETIME NOT NULL, photos LONGTEXT NOT NULL, policies LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel_amenity (id INT AUTO_INCREMENT NOT NULL, hotel_id_id INT DEFAULT NULL, amenity_id_id INT DEFAULT NULL, INDEX IDX_782A674A9C905093 (hotel_id_id), INDEX IDX_782A674A61D5C803 (amenity_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, room_id_id INT NOT NULL, user_id_id INT NOT NULL, chek_in_time DATETIME NOT NULL, check_out_date DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, payment_status VARCHAR(255) NOT NULL, special_requests LONGTEXT DEFAULT NULL, promotional_code VARCHAR(50) DEFAULT NULL, number_of_guests INT NOT NULL, INDEX IDX_42C8495535F83FFC (room_id_id), INDEX IDX_42C849559D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, hotel_id_id INT NOT NULL, room_number VARCHAR(255) NOT NULL, room_type VARCHAR(255) NOT NULL, capacity INT NOT NULL, price_per_night DOUBLE PRECISION NOT NULL, availability TINYINT(1) NOT NULL, room_size VARCHAR(255) NOT NULL, photos LONGTEXT NOT NULL, bed_type VARCHAR(150) NOT NULL, smoking_preference VARCHAR(255) DEFAULT NULL, INDEX IDX_729F519B9C905093 (hotel_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_amenity (id INT AUTO_INCREMENT NOT NULL, amenity_name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(150) NOT NULL, phone_number VARCHAR(50) NOT NULL, adress LONGTEXT NOT NULL, date_of_birth DATE NOT NULL, nationality VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hotel_amenity ADD CONSTRAINT FK_782A674A9C905093 FOREIGN KEY (hotel_id_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE hotel_amenity ADD CONSTRAINT FK_782A674A61D5C803 FOREIGN KEY (amenity_id_id) REFERENCES room_amenity (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495535F83FFC FOREIGN KEY (room_id_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B9C905093 FOREIGN KEY (hotel_id_id) REFERENCES hotel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel_amenity DROP FOREIGN KEY FK_782A674A9C905093');
        $this->addSql('ALTER TABLE hotel_amenity DROP FOREIGN KEY FK_782A674A61D5C803');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495535F83FFC');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559D86650F');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B9C905093');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE hotel_amenity');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_amenity');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
