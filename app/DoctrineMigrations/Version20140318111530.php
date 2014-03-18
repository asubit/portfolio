<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140318111530 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_canonical VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Work (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, name_canonical VARCHAR(255) DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, date_creation DATE DEFAULT NULL, photos LONGTEXT DEFAULT NULL COMMENT '(DC2Type:simple_array)', short_description VARCHAR(500) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_F37CC7BE12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Work ADD CONSTRAINT FK_F37CC7BE12469DE2 FOREIGN KEY (category_id) REFERENCES Category (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Work DROP FOREIGN KEY FK_F37CC7BE12469DE2");
        $this->addSql("DROP TABLE Category");
        $this->addSql("DROP TABLE Work");
    }
}
