<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Repository;
use Soulrpg\CgrdNewsApp\Utility\DbConnection;

class NewsRepository
{
    public function getAll(): array
    {
        $conn = DbConnection::getDatabaseConnection();
        $stmt = $conn->prepare('SELECT * FROM news');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add(string $title, string $description): void
    {

    }

    public function remove(int $id): void
    {

    }

    public function update(int $id, string $title, string $description): void
    {
        
    }
}
