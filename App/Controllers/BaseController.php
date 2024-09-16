<?php

namespace App\Controllers;
use App\Model\View;
abstract class BaseController
{

    protected $view;

    public function __construct()
    {
        if (!$this->access()) {
            die('Wrong role!');
        }
        $this->view = new View();

    }
    protected function access(): bool
    {
        return true;
    }
    protected static function contentype()
    {
        header('Content-Type: application/json');
    }

    protected function getClientIp(): ?string {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipAddress ?? null;
    }
}