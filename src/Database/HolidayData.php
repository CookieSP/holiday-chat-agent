<?php

namespace App\Database;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HolidayData extends AbstractController
{
    const TABLE_HOLIDAY = 'HolidayChatAgentDataSet';
    const COLUMN_CLIMATE = 'TempRating';
    const COLUMN_RATING = 'StarRating';

    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function fetch(Request $request): JsonResponse
    {
        $climate = $request->get('climate');
        $rating= $request->get('rating');

        $query = $this->connection->createQueryBuilder();
        $query->select('*')
            ->from(self::TABLE_HOLIDAY)
            ->where(self::COLUMN_CLIMATE . '= :climate')
            ->andwhere(self::COLUMN_RATING . '= :StarRating')
            ->setParameter('climate', $climate)
            ->setParameter('StarRating', $rating);

        $holidayData[] = $query->execute()->fetchAll();

        return new JsonResponse($holidayData);
    }
}