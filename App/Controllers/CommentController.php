<?php
namespace App\Controllers;
use App\Model\FavoritePost;
use App\Model\Comments;


//use App\Services\EmailService;
class CommentController extends BaseController
    {
    protected $favoritePostModel;
    public function __construct()
        {
        parent::__construct();

        $this->favoritePostModel = new FavoritePost;
        }
    public function addComment()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            parent::contentype();

            $user_id = $_POST['user_id'];
            $post_id = $_POST['post_id'];
            $text = $_POST['comment'];
            $comment_date = time();
            $response = [];

            $commentsModel = new Comments();

            $success = $commentsModel->createComment(
                [
                    'user_id' => $user_id,
                    'post_id' => $post_id,
                    'text' => $text,
                    'comment_date' => $comment_date
                ]
            );

            if ($success) {
                $response['success'] = 'success';
                } else {
                $response['error'] = 'error';
                }
            }
        echo json_encode($response);

        }
    public function statusCommentChoise()
        {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            parent::contentype();

            $comment_id = $_POST['comment_id'];
            $comment_status = $_POST['comment_status'];

            $response = [];

            $commentsModel = new Comments();

            $success = $commentsModel->updatestatus(
                [
                    'id' => $comment_id,
                    'status' => $comment_status
                ]
            );


            if ($success) {
                if ($comment_status === 'approved') {
                    $comment = $commentsModel->getCommentById($comment_id);

                    $post_id = $comment->post_id;

                    $emails = $this->favoritePostModel->getEmailByPostID($post_id);
                  //  var_dump($emails);die();
                    //$post = new PostController();
                    foreach ($emails as $email) {
                        $to = $email['email'];
                        $subject = 'New Comment on Favorite Post';
                        $message = "A new comment has been added to a post you favorited http://localhost/post/show/{$post_id} Comment: {$comment->text}";
                        $headers = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                        $sent = mail($to, $subject, $message, $headers);

                        if (!$sent) {
                            throw new \Exception('Failed to send email to ' . $email['email']);
                            }
                        }
                    }
                $response['success'] = 'success';
                } else {
                $response['error'] = 'error';
                }
            }
        echo json_encode($response);

        }

    }