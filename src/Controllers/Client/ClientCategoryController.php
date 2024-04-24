<?php

namespace Thanhdo\Mvcoop\Controllers\Client;

use Thanhdo\Mvcoop\Commons\Controller;
use Thanhdo\Mvcoop\Models\Category;
use Thanhdo\Mvcoop\Models\Post;


class ClientCategoryController extends Controller
{

    private Post $post;
    private Category $category;

    public function __construct()
    {
        $this->post = new Post;
        $this->category = new Category;
    }


    public function list($id,$page=1)
    {

        $posts = $this->post->getByCategory($id,$page);
        $trendings = $this->post->Trending();
        $latests = $this->post->Latest();
        $category = $this->category->getByID($id);
        $rowCount = $this->post->RowCountPost($id);
        $trang = ceil ($rowCount / 5);

        return $this->renderViewClient(
            'category-list',
            [   
                'category' => $category,
                'posts' => $posts,
                'trendings' => $trendings,
                'latests' => $latests,
                'trang' => $trang,
                'page' => $page

            ]
        );
    }


}
