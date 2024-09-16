<?php
namespace App\Services;
use App\Model\User;

class AuthUserServices
{
    public $role;
    public $id;
    public function checkAuth()
    {
        $auth_user = $_COOKIE['auth_user'] ?? null;
   

        if ($auth_user != null) {
            $userModel = new User();
            $user = $userModel->authUser(['login' => $auth_user]);
            if ($user) {
                $this->role = $user['role'];
                $this->id = $user['id'];
                //$this->view->setData(['user' => $user]);
            }
        } else {
            return null;
        }
    }
}