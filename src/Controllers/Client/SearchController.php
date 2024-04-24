<?php

namespace Thanhdo\Mvcoop\Controllers\Client;

use Thanhdo\Mvcoop\Commons\Controller;
use Thanhdo\Mvcoop\Models\Category;
use Thanhdo\Mvcoop\Models\Post;

class SearchController extends Controller
{
    private Post $post;
    private Category $category;

    public function __construct()
    {
        $this->post = new Post;
        $this->category = new Category;
    }

    public function search()
    {   
        $key = $_GET['key'];
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
       
        $posts = $this->post->getBySearch($key, $page);
        $rowCount = $this->post->RowCountPostSearch($key);
        $trang = ceil($rowCount / 5);

        $trendings = $this->post->Trending();
        $latests = $this->post->Latest();
        return $this->renderViewClient(
            'search',
            [
                'trendings' => $trendings,
                'latests' => $latests,
                'posts' => $posts,
                'trang' => $trang,
                'page' => $page,
                'key' => $key
            ]
        );
    }
}
