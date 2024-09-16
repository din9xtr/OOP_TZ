<?php
namespace App\Model;
use \PDO;
class Db
{

    protected PDO $dbh;
    protected static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __construct()
    {
        $config = (include __DIR__ . '/../../config/Config.php')['db'];
        //var_dump($config);
        $this->dbh = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8mb4',
            $config['user'],
            $config['password']
        );
    }
    public function execute($sql, $data = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        foreach ($data as $key => $value) {
            $sth->bindValue($key, $value);
        }
        return $sth->execute($data);
    }

    public function query(string $sql, string $class, array $data = []): array
    {
        $sth = $this->dbh->prepare($sql);

        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_INT);
            } elseif (is_string($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_STR);
            }
        }

        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function fetch(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_INT);
            } elseif (is_string($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_STR);
            }
        }

        $sth->execute($data);
        return $sth->fetch(PDO::FETCH_ASSOC);

    }
    public function fetchAll(string $sql, array $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_INT);
            } elseif (is_string($value)) {
                $sth->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
    
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}



