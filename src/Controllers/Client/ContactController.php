<?php 

namespace Thanhdo\Mvcoop\Controllers\Client;

use Thanhdo\Mvcoop\Commons\Controller;

class ContactController extends Controller {
    public function contact() {
        return $this->renderViewClient('contact');
    }
}