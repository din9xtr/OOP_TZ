<?php
namespace App;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Model\ChatMessage;
use App\Model\User;

class MyChat implements MessageComponentInterface
    {
    protected $clients;
    protected $chatModel;
    protected $userModel;



    public function __construct()
        {
        $this->clients = new \SplObjectStorage;
        $this->chatModel = new ChatMessage();
        $this->userModel = new User();
        }

    public function onOpen(ConnectionInterface $conn)
        {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";

        $recentMessages = $this->chatModel->getRecentMessagesObj();

        $messageData = [];

        foreach ($recentMessages as $message) {
            $messageData[] = [
                'login' => $message->login,
                'message' => $message->message,
                'date' => $message->getDate($message->message_time)
            ];
            }

        $messageData = array_reverse($messageData);
        $conn->send(json_encode(['recentMessages' => $messageData]));
        }

    public function onMessage(ConnectionInterface $from, $msg)
        {
        $numRecv = count($this->clients) - 1;
        echo sprintf(
            'Connection %d sending message "%s" to %d other connection%s' . "\n",
            $from->resourceId,
            $msg,
            $numRecv,
            $numRecv == 1 ? '' : 's'
        );


        $data = json_decode($msg, true);
        if (!isset($data['userId'])) {
            $from->send(json_encode(['error' => 'not authenticated']));
            return;
            }


        if ($data['userId']) {



            $this->chatModel->saveMessage($data['userId'], $data['message']);
            $login = $this->userModel->getUserLoginById($data['userId']);
            $time = $this->chatModel->getDate(time());
            $messageData = [
                'login' => $login,
                'message' => $data['message'],
                'date' => $time
            ];

            foreach ($this->clients as $client) {
                $client->send(json_encode($messageData));
                }
            } else {
            $from->send(json_encode(['error' => 'not authenticated']));
            }
        }

    public function onClose(ConnectionInterface $conn)
        {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
        }

    public function onError(ConnectionInterface $conn, \Exception $e)
        {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
        }
    }
