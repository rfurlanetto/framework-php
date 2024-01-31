<?php

namespace Routes;

class Routes
{
    public function load()
    {
        return [
            "GET" => [
                '/' =>['IndexController' => 'index'],
                'save' => ['IndexController' => 'save']
            ],
            "POST" => [
                '/' =>['IndexController' => 'save']
            ],
            "DELETE" => [
                '/' =>['controller' => 'action']
            ],
            "PUT" => [
                '/' =>['controller' => 'action']
            ]
        ];
    }
}