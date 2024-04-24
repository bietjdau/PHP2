<?php

namespace  Thanhdo\Mvcoop\Controllers\Admin;

use Thanhdo\Mvcoop\Commons\Controller;

use Thanhdo\Mvcoop\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    private  string $folder = 'category.';
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $data['categories'] = $this->category->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $this->category->insert($_POST['name']);

            header('Location:/admin/category');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    public function update($id)
    {
        $data['category'] = $this->category->getById($id);

        if (empty($data['category'])) {
            die(404);
        }
        if (!empty($_POST)) {



            $this->category->update(
                $data['category']['id'],
                $_POST['name'],
            );

            $_SESSION['success'] = 'Thao tác thành công';

            header("Location:/admin/category/$id/update");
            exit();
        }


        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function delete($id)
    {
        $this->category->deleteByID($id);

        header('Location: /admin/category');
        exit();
    }

    public function show($id)
    {
        $data['category'] = $this->category->getById($id);

        if (empty($data['category'])) {
            return $this->renderViewAdmin('page.die404', $data);
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
}
