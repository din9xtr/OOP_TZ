<?php
namespace App\Controllers;

use App\Model\FavoritePost;
use App\Model\User;
use App\Model\Post;

class UserController extends BaseController
    {
    public $role;
    public $id;
    public function reg()
        {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            parent::contentype();

            $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $password = $_POST['password'];
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // var_dump($hashedPassword);
            $response = [];

            $userModel = new User();

            $success = $userModel->regUser([
                'login' => $login,
                'password' => $hashedPassword,
                'email' => $email
            ]);


            if ($success) {
                $response['success'] = 'success';
                $response['message'] = 'Successful Registration';
                $response['hash'] = $hashedPassword;
                $response['hashVerife'] = password_verify($password, $hashedPassword);
                } else {
                $response['error'] = 'error';
                $response['message'] = 'Something Wrong';
                }

            echo json_encode($response);

            } else {
            echo $this->view->render(__DIR__ . '/../Views/User/reg.php');
            }
        }
    public function auth()
        {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            parent::contentype();

            $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $password = $_POST['password'];
            $userModel = new User();
            $success = $userModel->authUser([
                'login' => $login
            ]);
            $response = [];


            if ($success && isset($success['id']) && password_verify($password, $success['password'])) {
                setcookie('auth_user', $login, time() + 3600 * 24, '/');
                setcookie('role_user', $success['role'], time() + 3600 * 24, '/');
                $response['success'] = 'success';
                $response['message'] = 'Welocome';
                } elseif (strlen($login) <= 0 && strlen($password) <= 0) {
                $response['error'] = 'error';
                $response['message'] = 'Past something';
                } else {
                $response['error'] = 'error';
                $response['message'] = 'Wrong';
                }

            }
        echo json_encode($response);
        }
    public function exit()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            parent::contentype();


            $login = isset($_COOKIE['auth_user']) ? $_COOKIE['auth_user'] : null;


            if ($login !== null) {
                unset($_COOKIE['auth_user']);
                setcookie('auth_user', '', time() - 3600 * 24, '/');
                unset($_COOKIE['role_user']);
                setcookie('role_user', '', time() - 3600 * 24, '/');
                }
            $response = ['success' => true];
            } else {
            $response = ['error' => 'Invalid request method'];
            }

        echo json_encode($response);
        }
    public function auth_user()
        {

        $auth_user = isset($_COOKIE['auth_user']) ? $_COOKIE['auth_user'] : null;

        $user = null;

        if ($auth_user) {
            $userModel = new User();
            $user = $userModel->authUser(['login' => $auth_user]);
            }


        $this->view->setData(['user' => $user]);
        //var_dump($user);die();

        if ($user && isset($user['role'])) {

            switch ($user['role']) {
                case 'admin':
                    echo $this->view->render(__DIR__ . '/../Views/User/admin.php');
                    break;
                case 'editor':
                    echo $this->view->render(__DIR__ . '/../Views/User/editor.php');
                    break;
                case 'user':
                    // Get favorite post
                    $favorites = new FavoritePost();
                    //var_dump($user['id']);die();
                    $favorites = $favorites->getFavoritesByUser($user['id']);
                    //var_dump($favorites);die;
                    // 
                    if ($favorites == true) {
                        $postModel = new Post();
                        //var_dump($favorites['user_id']);die();
                        $post = $postModel->getFavorites($favorites['user_id']);

                        $this->view->setData([
                            'user' => $user,
                            'favorites' => $favorites,
                            'post' => $post

                        ]);
                        echo $this->view->render(__DIR__ . '/../Views/User/user.php');
                        break;
                        } else
                        echo $this->view->render(__DIR__ . '/../Views/User/user.php');
                    break;
                default:

                    echo $this->view->render(__DIR__ . '/../Views/User/ban.php');
                    break;
                }
            } else {
            echo $this->view->render(__DIR__ . '/../Views/User/auth.php');
            }
        return $user;
        }
    }