<?php
session_start();

require_once './vendor/autoload.php';
//khởi tạo đối tượng
//use Bramusy\Router\Router;
require_once './helper.php';

// khai báo các đường dẫn mà mình muốn
require_once './env.php';

// use Xuyenqua\Mvcoop\Commons\Model;

// $model = new Model();
// $model->testConnect();
// die;


// use Xuyenqua\Mvcoop\Models\User;

// $user = new User();
// $user->testConnect();
// die;

require_once './routes.php';

// chạy đường dẫn
