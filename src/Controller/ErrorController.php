<?php

namespace App\Controller;

class ErrorController extends AbstractController {
    public function notFound(): string {
        $properties = ['error_message' => 'Page not found!'];

        //global $cookieValue,$cookieName,$user;
        return require_once('views/error.view.php');
    }
}