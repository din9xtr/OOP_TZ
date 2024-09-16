<?php
namespace App\Model;
use App\Model\Db;

class FavoritePost
{
    private DB $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    public function addFavorite($userID, $postID): bool
    {
        $sql = 'INSERT INTO favorite_posts (user_id, post_id) VALUES (:user_id, :post_id)';
        return $this->db->execute($sql, [
            ':user_id' => $userID,
            ':post_id' => $postID
        ]);
    }
    public function removeFavorite($userID, $postID)
    {
        $sql = 'DELETE FROM favorite_posts WHERE (user_id = :user_id) AND (post_id = :post_id)';
        return $this->db->execute($sql, [
            ':user_id' => $userID,
            ':post_id' => $postID
        ]);
    }
    public function getFavoritesByUser($userId) 
    {
        $sql = 'SELECT * FROM favorite_posts WHERE user_id = :user_id';
        return $this->db->fetch($sql, [
            ':user_id' => $userId
        ]);
    }
    public function isFavorite( int $userID, int $postID)
    {
        $sql = 'SELECT * FROM favorite_posts WHERE user_id = :user_id AND post_id = :post_id';
        return $this->db->fetch($sql, [
            ':user_id' => $userID,
            ':post_id' => $postID
        ]);
    }
    public function getEmailByPostID($post_id): array 
    {
        $sql = 'SELECT users.email FROM favorite_posts
                INNER JOIN users ON favorite_posts.user_id = users.id
                WHERE favorite_posts.post_id = :post_id';
        return $this->db->fetchAll($sql,[':post_id' => $post_id]);
    }
  
}