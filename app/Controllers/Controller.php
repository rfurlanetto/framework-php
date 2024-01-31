<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller
{

    public static function view(string $view, array $data = [])
    {
        $viewPath = dirname(__FILE__, 2) . '/views';

        if(!file_exists($viewPath . DIRECTORY_SEPARATOR . $view . '.php')){
            throw new \Exception("A view {$view} não existe!");
        }

        $template = new Engine($viewPath);
        echo $template->render($view, $data);

    }

    public function request()
    {
        return $_REQUEST;
    }
}