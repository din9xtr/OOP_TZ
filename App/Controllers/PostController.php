<?php
namespace App\Controllers;

use App\Model\Comments;
use App\Model\Post;
use App\Model\User;
use App\Model\FavoritePost;
use App\Services\AuthUserServices;
class PostController extends BaseController
{
    public function show($id)
    {
        $user = new AuthUserServices();
        $user->checkAuth();

        $postModel = new Post();
        $post = $postModel->getById($id);
        if ($post) {
            $postModel->incrementViewCount($this->getClientIp(), $id);
        }
        $userRole = $user->role ?? 'guest';

        $commentModel = new Comments();
        $comments = $commentModel->getCommentsByPostId($id, $userRole);

        foreach ($comments as &$comment) {

            $comment->formattedDate = $comment->getDate($comment->message_time);
        }

        // var_dump($user == null);die();
        if ($user->role != null) {
            $favorites = new FavoritePost();
            $favorites = $favorites->isFavorite($user->id, $post->id);


        }
        if ($post) {
            $this->view->setData([
                'post' => $post,
                'user' => $user,
                'comments' => $comments,
                'favorites' => $favorites,
                'view' => $this->view
            ]);
            //           $this->view->setData(['user'=> $user]);
            // переписать 
            echo $this->view->render(__DIR__ . '/../Views/Post/show.php');
        } else {
            echo 'Post not found';
        }
    }
    public function update()
    {
        parent::contentype();
        $data = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'post_text' => $_POST['post_text']
        ];

        $postModel = new Post();
        $success = $postModel->updatePost($data);
        echo json_encode($success);
    }

    public function delete()
    {
        parent::contentype();

        $id = $_POST['id'];
        $postModel = new Post();
        $success = $postModel->deletePost($id);
        echo json_encode($success);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            parent::contentype();

            $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $post_text = trim(filter_var($_POST['post_text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $authorLogin = $_COOKIE['auth_user'] ?? null;

            $response = [];

            if ($authorLogin) {
                $userModel = new User();
                $user = $userModel->authUser(['login' => $authorLogin]);
                if ($user) {
                    //var_dump($user);die();
                    $postModel = new Post();
                    $success = $postModel->createPost([
                        'title' => $title,
                        'post_text' => $post_text,
                        'post_date' => time(),
                        'author' => $authorLogin,
                        'author_id' => $user['id']
                    ]);

                    if ($success) {
                        $response['success'] = 'success';
                    } else {
                        $response['error'] = 'error';
                    }
                } else {
                    $response['error'] = 'User not found';
                }
            } else {
                $response['error'] = 'not authenticated';
            }

            echo json_encode($response);

        } else {

            echo $this->view->render(__DIR__ . '/../Views/Post/create.php');
        }
    }

    public function index_auth()
    {

        $limit = 3;
        $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;
        $offset = ($page_number - 1) * $limit;


        $type = $_GET['type'] ?? 'latest';
        $postModel = new Post();


        if ($type === 'popular') {
            $posts = $postModel->getAllByView($limit, $offset);
        } else {
            $posts = $postModel->getAll($limit, $offset);
        }


        $total_posts = $postModel->getTotalCount();
        // var_dump($total_posts);die();
        $total_pages = ceil($total_posts / $limit);

        $this->view->setData([
            'posts' => $posts,
            'current_page' => $page_number,
            'total_pages' => $total_pages
        ]);
        //var_dump($total_pages);
        // $auth_user = isset($_COOKIE['auth_user']) ? $_COOKIE['auth_user'] : null;
        $user = new AuthUserServices();
        $user->checkAuth();
        //var_dump();die();
        if ($user->id != null) {
            echo $this->view->render(__DIR__ . '/../Views/Post/index_auth.php');
        } else {
            echo $this->view->render(__DIR__ . '/../Views/Post/index.php');

        }


    }

    public function loadMore()
    {

        $postModel = new Post();
        $limit = $_GET['limit'] ?? 3;



        $page = $_GET['page'];
        $offset = $page * $limit;
        if ($_GET['offset']) {
            $offset = $_GET['offset'] + ($page - 1) * $limit;
        }

        $sort = $_GET['sort'] ?? 'latest';

        if ($sort === 'popular') {
            $posts = $postModel->getAllByView($limit, $offset);
        } else {
            $posts = $postModel->getAll($limit, $offset);
        }
        $html = '';
        foreach ($posts as $post) {

            $this->view->setData(['post' => $post]);
            $html .= $this->view->render(__DIR__ . '/../Views/Post/single.php');
        }
        echo $html;

    }


}