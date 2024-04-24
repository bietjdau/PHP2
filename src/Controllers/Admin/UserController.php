<?php

namespace  Thanhdo\Mvcoop\Controllers\Admin;

use Thanhdo\Mvcoop\Commons\Controller;

use Thanhdo\Mvcoop\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $data['users'] = $this->user->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $this->user->insert($_POST['name'], $_POST['email'], $_POST['password']);

            header('Location:/admin/users');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }


    public function update($id)
    {
        $data['user'] = $this->user->getById($id);

        if (empty($data['user'])) {
            die(404);
        }



        if (!empty($_POST)) {



            $this->user->update(
                $data['user']['id'],
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );

            $_SESSION['success'] = 'Thao tác thành công';

            header("Location:/admin/users/$id/update");
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }


    public function show($id)
    {
        $data['user'] = $this->user->getById($id);

        if (empty($data['user'])) {
            return $this->renderViewAdmin('page.die404', $data);
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function delete($id)
    {
        $this->user->deleteByID($id);

        header('Location:/admin/users');
        exit();
    }
}
