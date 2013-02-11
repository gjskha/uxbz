<?php
namespace Swiftlet\Controllers;

class Login extends \Swiftlet\Controller {

    protected $title = 'Please sign in'; 

    public function index() {
        $navigation = $this->app->getModel('navigation')->Navbar("Login");
        $this->view->set('navigation', $navigation);
    }
}

?>
