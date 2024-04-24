<?php

namespace Thanhdo\Mvcoop\Controllers\Client;

use Thanhdo\Mvcoop\Commons\Controller;
use Thanhdo\Mvcoop\Models\Comment;
use Thanhdo\Mvcoop\Models\Post;

class ClientPostController extends Controller
{
    private Post $post;
    private Comment $comment;
    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }
    public function show($id)
    {
        $post = $this->post->getByID($id);
        $trendings = $this->post->Trending();
        $latests = $this->post->Latest();
        $populars = $this->post->popular($post['category_id']);
        $comments = $this->comment->getAllByIdPost($id);
        // debug($_POST);
        if(!empty($_POST)){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $date = date('Y-m-d');
            $this->comment->insert($id,$name,$email,$message,$date);
            header('Location:/post/'.$id);
        }
        $this->post->view($id);
        // debug($post);
        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
                'trendings' => $trendings,
                'latests' => $latests,
                'populars' => $populars,
                'comments' => $comments

            ]
        );
    }
}
