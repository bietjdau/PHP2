<?php

namespace  Thanhdo\Mvcoop\Controllers\Admin;

use Thanhdo\Mvcoop\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {  
        return $this->renderViewAdmin('dashboard');
        // return $this->renderViewAdmin('layouts.master');
    }
}

