<?php
/**
 * Created by PhpStorm.
 * User: ktv911
 * Date: 04.12.19
 * Time: 11:52
 */

namespace Base\Db;

/**
 * Class Pdo
 * @package Base\Db
 */
class Pdo
{
    /**
     * @var string
     */
    private $dsn = "mysql:host=service-mysql:3306;dbname=app";

    /**
     * @var \PDO
     */
    private $connect;

    /**
     * Pdo constructor.
     */
    public function __construct()
    {
        try{
            $this->connect = new \PDO($this->dsn, "app", "secret");
            $this->createTable();
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Get pdo connection
     * @return \PDO
     */
    public function getConnect(): \PDO
    {
        return $this->connect;
    }

    /**
     * Create table users
     */
    private function createTable(): void
    {
        $this->connect->query('CREATE TABLE users 
          (
          uid INTEGER AUTO_INCREMENT NOT NULL,
          firstName VARCHAR(100) NOT NULL,
          lastName VARCHAR(100) NOT NULL,
          description VARCHAR(255) NOT NULL,
          birthDay DATETIME NOT NULL,
          dateChange DATETIME NOT NULL,
          PRIMARY KEY (uid)
          )
         ');
    }
}