<?php

namespace Thanhdo\Mvcoop\Models;

use Thanhdo\Mvcoop\Commons\Model;

class Post extends Model
{
    public function getAll()
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id WHERE 1";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function RowCountPost($id)
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id WHERE posts.category_id  =:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getByID($id)
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id WHERE posts.id  =:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($category_id, $title, $content, $date, $excerpt = null, $image = null)
    {
        try {
            $sql = "
            INSERT INTO `posts`( `category_id`, `title`, `excerpt`, `content`, `image`,`date`) 
            VALUES (:category_id, :title, :excerpt, :content, :image,:date)
            ";
            // echo $sql;

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':date', $date);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update($id, $category_id, $title, $content, $excerpt = null, $image = null)
    {
        try {
            $sql = "
            UPDATE `posts` 
            SET `category_id`=:category_id,
                `title`=:title,
                `excerpt`=:excerpt,
                `content`=:content,
                `image`=:image 
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);


            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM  posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getFirstLatest()
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 1";

            $stmt = $this->conn->prepare($sql);


            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getTop6()
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 6";

            $stmt = $this->conn->prepare($sql);


            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function view($id)
    {
        try {
            $sql = "UPDATE `posts` SET `view`= view + 1 WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function trending()
    {
        try {
            $sql = "SELECT * FROM posts ORDER BY view DESC LIMIT 5";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function popular($id)
    {
        try {
            $sql = "SELECT * FROM posts WHERE category_id = :id  LIMIT 5";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function latest()
    {
        try {
            $sql = "SELECT * FROM posts ORDER BY id ASC LIMIT 5";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function getByCategory($id, $page)
    {
        try {
            $offset = ($page - 1) * 5; // Calculate offset

            $sql = "SELECT posts.id, posts.category_id, title, excerpt, content, image, categories.name AS category_name, posts.date, posts.view 
                    FROM `posts` 
                    JOIN categories ON posts.category_id = categories.id 
                    WHERE posts.category_id = :id
                    ORDER BY posts.id DESC 
                    LIMIT :offset, 5"; // Corrected SQL query

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":offset", $offset, \PDO::PARAM_INT); // Bind offset parameter as integer

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getBySearch($key, $page)
    {
        try {
            $offset = ($page - 1) * 5; // Calculate offset

            $sql = "SELECT posts.id, posts.category_id, title, excerpt, content, image, categories.name AS category_name, posts.date, posts.view 
            FROM `posts` 
            JOIN categories ON posts.category_id = categories.id 
            WHERE title LIKE CONCAT('%', :keysearch, '%') OR excerpt LIKE CONCAT('%', :keysearch, '%')
            ORDER BY posts.id ASC
            LIMIT :offset, 5"; // Corrected SQL query

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":keysearch", $key);
            $stmt->bindParam(":offset", $offset, \PDO::PARAM_INT); // Bind offset parameter as integer

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function RowCountPostSearch($key)
    {
        try {
            $sql = "SELECT posts.id, posts.category_id, title, excerpt, content, image, categories.name AS category_name, posts.date, posts.view 
            FROM `posts` 
            JOIN categories ON posts.category_id = categories.id 
            WHERE title LIKE CONCAT('%', :keysearch, '%') OR excerpt LIKE CONCAT('%', :keysearch, '%')
            ORDER BY posts.id ASC    
            "; // Corrected SQL query

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":keysearch", $key);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getNew4()
    {
        try {
            $sql = "SELECT posts.id,posts.category_id,title,excerpt,content,image,categories.name'category_name',posts.date,posts.view FROM `posts` JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT 4";

            $stmt = $this->conn->prepare($sql);


            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
