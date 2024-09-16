<?php
namespace App\Controllers;

use App\Services\AuthUserServices;
use App\Model\ChatMessage;

class ChatController extends BaseController
{
    protected $authService;
    protected $chatModel;

    public function __construct()
    {
        parent::__construct();
        $this->authService = new AuthUserServices();
        $this->chatModel = new ChatMessage();
    }

    public function index()
    {
        $this->authService->checkAuth();
        
        if ($this->authService->id) {
            $this->view->setData([
                'user_id' => $this->authService->id
            ]);
            echo $this->view->render(__DIR__ . '/../Views/Chat/chat.php', );
        } else {
            echo $this->view->render(__DIR__ . '/../Views/User/auth.php');
        }
    }
}
