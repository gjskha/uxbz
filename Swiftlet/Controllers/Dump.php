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

        $urlModel = $this->app->getModel('Url');
        $dump = $urlModel->dumpRecords();
        $this->view->set('dump', $dump);
    }
}

?>
