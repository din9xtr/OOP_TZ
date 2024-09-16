<?php
namespace App\Controllers;
use App\Model\FavoritePost;
class FavoriteController extends BaseController
    {
    private $favoritePostModel;
    private $user;

    public function __construct()
        {
        parent::__construct();
        }

    public function setUser($user)
        {
        $this->user = $user;
        }

    public function addFavorite()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            parent::contentype();

            $user_id = $_POST['user_id'];
            $post_id = $_POST['post_id'];

            $response = [];

            $favoriteModel = new FavoritePost();

            $success = $favoriteModel->addFavorite($user_id, $post_id);

            if ($success) {
                $response['success'] = 'success';
                } else {
                $response['error'] = 'error';
                }
            }
        echo json_encode($response);

        }

    public function removeFavorite()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            parent::contentype();

            $user_id = $_POST['user_id'];
            $post_id = $_POST['post_id'];

            $response = [];

            $favoriteModel = new FavoritePost();

            $success = $favoriteModel->removeFavorite($user_id, $post_id);
            if ($success) {

                $response['success'] = 'success';
                } else {
                $response['error'] = 'error';
                }

            echo json_encode($success);
            }
        }
    public function getFavorites()
        {
        $userId = $this->user['id'];
        return $this->favoritePostModel->getFavoritesByUser($userId);
        }

    }
