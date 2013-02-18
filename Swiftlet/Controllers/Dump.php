<?php

namespace Swiftlet\Controllers;

class Dump extends \Swiftlet\Controller
{
    protected $title = 'Dump';
		
    public function index()
    {
        /* set the navigation */
        $navigation = $this->app->getModel('navigation')->Navbar('Dump');
        $this->view->set('navigation', $navigation);


        /* validate params */  
        $valid = $this->app->getModel('Validation');

        /* desired page */
        if (isset($_GET['pg']) && $valid->Number($_GET['pg'])) {
            $pg = $_GET['pg']; 
        } else {
             $pg = 1;
        }
 
        /* ordering */
        if (isset($_GET['od']) && $valid->Number($_GET['od'])) {
            $od = $_GET['od']; 
        } else { 
            $od = -1;
        }

        /* column to sort by */
        if (isset($_GET['st']) && preg_match('/^(time|shortUrl|longUrl|count)$/', $_GET['st'])) {
            $st = $_GET['st'];
        } else {
            $st = 'time';
        }

        /* fetch the data */
        $urlModel = $this->app->getModel('Url');
        $dump = $urlModel->dumpRecords($pg, $st, $od);

        /* pagination */
        $pages = array_pop($dump);
        $this->view->set('pages', $pages);
        
        $this->view->set('dump', $dump);
    }
}

?>
