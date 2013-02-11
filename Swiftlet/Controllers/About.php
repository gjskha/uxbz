<?php

namespace Swiftlet\Controllers;

class About extends \Swiftlet\Controller {

    protected $title = 'About';

    public function index() {
        $navigation = $this->app->getModel('navigation')->Navbar("About");
        $this->view->set('navigation', $navigation);
    }

}
?>
