<?php

namespace Thanhdo\Mvcoop\Models;

use Thanhdo\Mvcoop\Commons\Model;

class Comment extends Model
{
    public function getAllByIdPost($id)
    {
        try {
            $sql = "SELECT * FROM `comments` WHERE post_id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($post_id, $name, $email, $message, $date)
    {
        try {
            $sql = "INSERT INTO `comments`(`post_id`, `name`, `email`, `message`, `date`) 
                    VALUES (:post_id,:name,:email,:message,:date)
                ";
            echo $sql ;

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':post_id', $post_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":message", $message);
            $stmt->bindParam(":date", $date);
            $stmt-> bindParam(":date" ,$date);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM `comments` WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            echo 'ERROT: ' . $e -> getMessage();
            die;
        }
    }
}
