<?php

namespace Swiftlet\Controllers;

class Dump extends \Swiftlet\Controller
{
    protected $title = 'Dump';
		
    public function index()
    {
        /* set the navigation */
        $navigation = $this->app->getModel('navigation')->Navbar("Dump");
        $this->view->set('navigation', $navigation);

        $pg =  $_GET["pg"];

        $urlModel = $this->app->getModel('Url');
        $dump = $urlModel->dumpRecords($pg);
        $pages = array_pop($dump);
        $this->view->set('dump', $dump);
        $this->view->set('pages', $pages);
    }
}

?>
