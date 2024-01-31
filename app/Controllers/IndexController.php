<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        var_dump($this->request());
        die('index');
    }

    public function save()
    {
        die('save');
    }
}