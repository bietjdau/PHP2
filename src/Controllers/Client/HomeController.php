<?php

namespace Thanhdo\Mvcoop\Controllers\Client;

use Thanhdo\Mvcoop\Commons\Controller;
// use Thanhdo\Mvcoop\Models\User;
use Thanhdo\Mvcoop\Models\Post;

class HomeController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }
    public function index()
    {
        $postFirstLatest = $this->post->getFirstLatest();
        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6, 3);
        $trendings = $this->post->Trending();
        $new4 = $this->post->getNew4();


        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6Chunk' => $postTop6Chunk,
                'trendings' => $trendings,
                'new4s' => $new4
            ]
        );
    }

    public function about(){
        return $this->renderViewClient('about');
    }
    
}
