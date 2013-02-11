<?php
namespace Swiftlet\Controllers;

class Create extends \Swiftlet\Controller
{
    protected $title = 'Create Short Link'; 

    public function index()
    {
        /* set the navigation menu */
        $navigation = $this->app->getModel('navigation')->Navbar("Create");
        $this->view->set('navigation', $navigation);
        
        
    }
}

?>
