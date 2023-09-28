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

    public function add(string $title, string $description): bool
    {
        $conn = DbConnection::getDatabaseConnection();
        $stmt = $conn->prepare('INSERT INTO news (title, description) VALUES (?, ?)');
        $stmt->execute([$title, $description]);
        $inserted = $stmt->rowCount();
        return $inserted === 1;
    }

    public function remove(int $id): bool
    {
        $conn = DbConnection::getDatabaseConnection();
        $stmt = $conn->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute([$id]);
        $deleted = $stmt->rowCount();
        return $deleted === 1;
    }

    public function update(int $id, string $title, string $description): bool
    {
        $conn = DbConnection::getDatabaseConnection();
        $stmt = $conn->prepare('UPDATE news SET title = ?, description = ? WHERE id = ?');
        $stmt->execute([$title, $description, $id]);
        $updated = $stmt->rowCount();
        return $updated === 1;
    }
}
