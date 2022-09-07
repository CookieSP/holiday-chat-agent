<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220907122151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Inserts data into Holiday table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
                        INSERT INTO HolidayChatAgentDataSet
                            (HolidayReference, HotelName, City, Continent, Country, Category, StarRating, TempRating, Location, PricePerNight)
                        VALUES  
                            (1, 'Uptown', 'Bali', 'Asia', 'Indonesia', 'active', 3, 'mild', 'mountain', 120.0000),
                            (2, 'Relaxamax', 'New Orleans', 'North America', 'USA', 'lazy', 4, 'mild', 'city', 28.0000),
                            (3, 'WindyBeach', 'Ventry', 'Europe', 'Ireland', 'active', 3, 'mild', 'sea', 42.0000),
                            (4, 'Twighlight', 'Marrakech', 'Africa', 'Morocco', 'lazy', 5, 'cold', 'mountain', 50.0000),
                            (5, 'TooHot', 'Sydney', 'Australia', 'Australia', 'lazy', 5, 'hot', 'sea', 67.0000),
                            (6, 'Castaway', null, 'Africa', 'The Maldives', 'lazy', 3, 'mild', 'sea', 120.0000),
                            (7, 'Eiffel Park', 'Paris', 'Europe', 'France', 'active', 4, 'mild', 'city', 45.0000),
                            (8, 'The Cape', 'Cape Town', 'Africa', 'South Africa', 'active', 4, 'mild', 'sea', 78.0000),
                            (9, 'Desert Dreams', 'Dubai', 'Asia', 'U.A.E', 'active', 4, 'hot', 'mountain', 67.0000),
                            (10, 'SeaViews', 'Bora Bora', 'Australia', 'French Polynesia', 'active', 3, 'mild', 'sea', 54.0000)
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("
        DELETE FROM HolidayChatAgentDataSet
        WHERE HolidayReference BETWEEN 1 AND 10;
        ");
    }
}
