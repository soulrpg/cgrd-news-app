<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp;

class NewsController
{
    public function list(): void 
    {
        echo('News - list');
    }

    public function show(int $id): void 
    {
        echo('News - show:' . $id);
    }

    public function create(): void 
    {
        echo('News - create:');
    }

    public function update(int $id): void 
    {
        echo('News - update');
    }

    public function delete(int $id): void 
    {
        echo('News delete');
    }
}