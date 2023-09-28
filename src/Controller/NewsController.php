<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

class NewsController
{
    public function list(): void 
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Templates');
        $twig = new \Twig\Environment($loader);

        echo $twig->render('index.html', ['news' => '']);
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
