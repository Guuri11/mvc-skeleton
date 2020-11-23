<?php

namespace App\Controller;

use App\Core\Request;
use App\Utils\DependencyInjector;
use Exception;

abstract class AbstractController {
    protected $request;
    protected $db;
    protected $config;
    protected $customerId;
    protected $di;

    public function __construct(DependencyInjector $di, Request $request)
    {
        $this->request = $request;
        $this->di = $di;

        try {
            $this->db = $di->get('PDO');
        } catch (Exception $e) {
        }
        //$this->config = $di->get('Utils\Config');

    }


    protected function render(string $template) {
        require_once ($template);
    }
}