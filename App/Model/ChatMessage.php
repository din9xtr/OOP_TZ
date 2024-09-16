<?php
namespace App\Model;
use App\Model\Db;


class ChatMessage
    {
    protected Db $db;
    public $message_time;

    public function __construct()
        {
        $this->db = Db::getInstance();
        }

    public function saveMessage(int $userId, string $message): bool
        {
        $sql = "INSERT INTO chat_messages (user_id, message, message_time) 
                    VALUES (:user_id, :message, :message_time)";

        return $this->db->execute($sql, [
            'user_id' => $userId,
            'message' => $message,
            'message_time' => time()
        ]);
        }
    public function getDate($timestamp): string
        {
        $date = date('d ', $timestamp);
        $array = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];
        $date .= $array[date('n', $timestamp) - 1];
        $date .= date(' Y H:i', $timestamp);

        return $date;
        }
    public function getRecentMessagesObj(int $limit = 20): array
        {
        $sql = "SELECT chat_messages.id, chat_messages.message, chat_messages.message_time, users.login 
                FROM chat_messages 
                JOIN users ON chat_messages.user_id = users.id 
                ORDER BY chat_messages.message_time DESC 
                LIMIT :limit";


        return $this->db->query($sql, static::class, ['limit' => $limit]);
        }
    public function getMessagesByUserId(int $userId, int $limit = 1): array
        {
        $sql = "SELECT chat_messages.id, chat_messages.message, chat_messages.message_time, users.login 
            FROM chat_messages 
            JOIN users ON chat_messages.user_id = users.id 
            WHERE chat_messages.user_id = :user_id
            ORDER BY chat_messages.message_time DESC 
            LIMIT :limit";

        return $this->db->query($sql, static::class, ['user_id' => $userId, 'limit' => $limit]);
        }

    }
