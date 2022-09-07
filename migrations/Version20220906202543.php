<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220906202543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates Holiday Table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
        CREATE TABLE 'HolidayChatAgentDataSet' 
        (
            'HolidayReference' INTEGER PRIMARY KEY,
            'HotelName' TEXT,
            'City' TEXT,
            'Continent' TEXT,
            'Country' TEXT,
            'Category' TEXT,
            'StarRating' INTEGER,
            'TempRating' TEXT,
            'Location' TEXT,
            'PricePerNight' DECIMAL(19,4) NOT NULL)
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("
        DROP TABLE 'HolidayChatAgentDataSet'
        ");
    }
}
