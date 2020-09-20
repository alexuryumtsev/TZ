<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200920191807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('create table products(id int(100) auto_increment primary key, name text not null); create index id on products (id);');
        $this->addSql('create table providers(id int(100) auto_increment primary key, name text not null); create index id on providers (id);');
        $this->addSql('create table supplies(id int(100) auto_increment primary key, id_provider int(100) not null, id_product int(100) not null); create index id on supplies (id);');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('drop table products');
        $this->addSql('drop table providers');
        $this->addSql('drop table supplies');
    }
}
