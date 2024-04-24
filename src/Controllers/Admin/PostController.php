<?php

namespace Thanhdo\Mvcoop\Controllers\Admin;

use Thanhdo\Mvcoop\Commons\Controller;

use Thanhdo\Mvcoop\Models\Category;

use Thanhdo\Mvcoop\Models\Comment;
use Thanhdo\Mvcoop\Models\Post;

class PostController extends Controller
{
    private Post $post;
    private Category $category;

    private Comment $comment;
    private string $folder = 'post.';

    const PATH_UPLOAD = '/uploads/post/';

    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
        $this->comment = new Comment();

    }
    public function index()
    {
        $data['posts'] = $this->post->getAll();
        // debug($data);
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content1'];
            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            $date = date('Y-m-d');
            if (!empty($image)) {

                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->post->insert($category_id, $title,  $content,$date, $excerpt, $imagePath);

            header('Location:/admin/post');
            exit();
        }

        $data['category'] = $this->category->getAll();

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }


    public function update($id)
    {
        $data['post'] = $this->post->getById($id);
        $data['category'] = $this->category->getAll();

        if (empty($data['post'])) {
            die(404);
        }

        if (!empty($_POST)) {

            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content1'];
            $image = $_FILES['image'] ?? null;
            $imagePath = $data['post']['image'];
            $move = false;
            if (!empty($image)) {
                $imagePath = self::PATH_UPLOAD . $image['name'];
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['post']['image'];
                } else {
                    $move = true;
                }

                // }else{
                //     unlink(PATH_ROOT.$data['post']['image']);
                // }
            }

            $this->post->update($id, $category_id, $title, $content, $excerpt,  $imagePath);

            if ($move && $data['post']['image'] && file_exists(PATH_ROOT . $data['post']['image'])) {
                unlink(PATH_ROOT . $data['post']['image']);
            }

            $_SESSION['success'] = 'Thao tác thành công';

            header("Location:/admin/post/$id/update");
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }


    public function show($id)
    {
        $data['post'] = $this->post->getById($id);
        $data['comments'] = $this->comment->getAllByIdPost($id);

       
        if (empty($data['post'])) {
            die(404);
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function delete($id)
    {
        $this->post->deleteByID($id);

        header('Location:/admin/post');
        exit();
    }

    public function deleteComment($id_post,$id_comment)
    {
        $this->comment->deleteByID($id_comment);

        header('Location:/admin/post/'.$id_post.'/show');
        exit();
    }
    
}
