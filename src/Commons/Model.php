<?php

namespace Thanhdo\Mvcoop\Commons;

//  use PDO;
class Model
{
    protected \PDO|null $conn;


    public function __construct()
    {
        $host = DB_HOST;
        $post = DB_PORT;
        $dbname = DB_NAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;

        try {
            $this->conn = new \PDO("mysql:host=$host;port=$post;dbname=$dbname", $username, $password);

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $PDOException) {
            echo "Kết nối thất bại: " . $PDOException->getMessage();
            die;
        }
    }

    public function testConnect()
    {
        echo '<pre>';
        print_r($this->conn);
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
