<?php
namespace App\Model;
use App\Model\Db;
class Comments
    {
    protected Db $db;
    public $comment_date;

    public function __construct()
        {
        $this->db = Db::getInstance();
        }
    public function getCommentsByPostId(int $postId, string $userRole): array 
        {
        $sql = '
            SELECT 
                comments.id, 
                comments.user_id, 
                comments.text, 
                comments.comment_date, 
                 comments.status, 
                users.login 
            FROM comments
            JOIN users ON comments.user_id = users.id
            WHERE comments.post_id = :post_id
        ';

        if ($userRole !== 'admin') {
            $sql .= ' AND comments.status = "approved"';
            }

        return $this->db->query($sql, static::class, [':post_id' => $postId]);
        }
    public function getDate(): string
        {
        $date = date('d ', $this->comment_date);
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
        $date .= $array[date('n', $this->comment_date) - 1];
        $date .= date(' Y H:i', $this->comment_date);

        return $date;
        }
    public function createComment(array $data): bool
        {
        $sql = 'INSERT INTO comments (user_id, post_id, text, comment_date) VALUES (:user_id, :post_id, :text, :comment_date)';
        return $this->db->execute($sql, [
            ':user_id' => $data['user_id'],
            ':post_id' => $data['post_id'],
            ':text' => $data['text'],
            ':comment_date' => $data['comment_date']
        ]);
        }
    public function updatestatus(array $data): bool
        {
        $sql = 'UPDATE comments SET status=:status WHERE id = :id';
        return $this->db->execute($sql, $data);
        }
    public function getCommentById(int $id): ?object
        {
        $sql = 'SELECT * FROM comments WHERE id = :id';
        $data = $this->db->query($sql, static::class, [':id' => $id]);
        return empty($data) ? null : $data[0];
        }
    }