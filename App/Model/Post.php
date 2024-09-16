<?php
namespace App\Model;


class Post
    {
    public int $id;
    public $post_date;
    public string $title;
    public string $post_text;

    public string $author;
    protected Db $db;
    public function __construct()
        {
        $this->db = Db::getInstance();
        }
    public function getAll(int $limit = 3, int $offset = 0): array
        {
        $sql = 'SELECT * FROM posts ORDER BY id DESC LIMIT :limit OFFSET :offset ';
        $data = [
            ':limit' => $limit,
            ':offset' => $offset
        ];

        return $this->db->query($sql, static::class, $data);
        }
    public function getAllByView(int $limit = 3, int $offset = 0): array
        {
        $sql = 'SELECT * FROM posts ORDER BY view_count	DESC LIMIT :limit OFFSET :offset ';
        $data = [
            ':limit' => $limit,
            ':offset' => $offset
        ];

        return $this->db->query($sql, static::class, $data);
        }

    public function getbyID(int $id): ?object
        {
        $sql = 'SELECT * FROM posts WHERE id=:id';
        $data = $this->db->query($sql, static::class, [':id' => $id]);
        return empty($data) ? null : $data[0];
        }

    public function getFavorites($user_id): ?array
        {
        $sql = 'SELECT * FROM posts WHERE posts.id IN(SELECT favorite_posts.post_id from favorite_posts WHERE favorite_posts.user_id=:user_id)';
        $data = $this->db->query($sql, static::class, [':user_id' => $user_id]);
        return empty($data) ? null : $data;
        }
    public function createPost(array $data): bool
        {
        $sql = 'INSERT INTO posts (title, post_text, post_date, author, author_id) VALUES (:title, :post_text, :post_date, :author, :author_id)';
        return $this->db->execute($sql, [
            ':title' => $data['title'],
            ':post_text' => $data['post_text'],
            ':post_date' => $data['post_date'],
            ':author' => $data['author'],
            ':author_id' => $data['author_id']
        ]);
        }


    public function updatePost(array $data): bool
        {
        $sql = 'UPDATE posts SET title = :title, post_text = :post_text WHERE id = :id';
        //  $sql = 'UPDATE posts SET title=:title post_text=:post_text WHERE id=:id';
        return $this->db->execute($sql, $data);
        }
    public function deletePost($id): bool
        {
        $sql = 'DELETE FROM posts WHERE id = :id';
        return $this->db->execute($sql, [':id' => $id]);
        }

    public function getDate(): string
        {
        $date = date('d ', $this->post_date);
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
        $date .= $array[date('n', $this->post_date) - 1];
        $date .= date(' Y H:i', $this->post_date);

        return $date;
        }

    public function getTotalCount(): int
        {
        $sql = 'SELECT COUNT(*) as count FROM posts';
        $result = $this->db->fetch($sql);
        return (int) $result['count'];
        }
    public function incrementViewCount(string $ipAddress, int $postId): bool
        {
        // была ли запись
        $sqlCheck = 'SELECT COUNT(*) FROM post_views WHERE post_id = :post_id AND ip_address = :ip_address';
        $count = $this->db->query($sqlCheck, static::class, [':post_id' => $postId, ':ip_address' => $ipAddress]);

        // новый 
        if ($count[0]->{'COUNT(*)'} == 0) {

            $sqlInsert = 'INSERT INTO post_views (post_id, ip_address) VALUES (:post_id, :ip_address)';
            $this->db->query($sqlInsert, static::class, [':post_id' => $postId, ':ip_address' => $ipAddress]);

            // обновление
            $sqlUpdate = 'UPDATE posts SET view_count = view_count + 1 WHERE id = :id';
            return $this->db->query($sqlUpdate, static::class, [':id' => $postId]) !== false;
            }

        return false; // если просмотр уже был засчитан
        }


    public function getViewCount(int $postId): int
        {
        $sql = 'SELECT view_count FROM posts WHERE id = :id';
        $result = $this->db->fetch($sql, [':id' => $postId]);
        return $result ? (int) $result['view_count'] : 0;
        }
    }