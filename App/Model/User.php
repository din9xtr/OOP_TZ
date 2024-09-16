<?php
namespace App\Model;

class User
{
    protected $id;
    protected $login;
    protected $password;
    protected Db $db;
    public $role;
    protected string $email;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function regUser(array $data): bool
    {
        $sql = 'INSERT INTO users (login,password,email) VALUES (:login,:password,:email)';
        return $this->db->execute($sql, [
            ':login' => $data['login'],
            ':password' => $data['password'],
            ':email' => $data['email'],
        ]);
    }
    public function authUser(array $data): ?array
    {
        $sql = 'SELECT id,password,login,role FROM users WHERE login=:login';
        return $this->db->fetch($sql, [
            ':login' => $data['login']
        ]);

    }
    public function getAll(array $data): ?object
    {
        $sql = 'SELECT * FROM users WHERE login=:login';

        $user = $this->db->fetch($sql, [
            ':login' => $data['login']
        ]);
        return empty($user) ? null : $user[0];

    }
    public function getUserLoginById(int $userId): ?string
    {
    $sql = "SELECT login FROM users WHERE id = :user_id LIMIT 1";
    $result = $this->db->query($sql, static::class, ['user_id' => $userId]);

    if (!empty($result)) {
        return $result[0]->login;
        }

    return null; 
    }
}