<?php

namespace Swiftlet\Controllers;

class Link extends \Swiftlet\Controller
{
    protected $title = "Your link is ready!";
		
    public function index()
    {
        $longUrl = $_POST["longUrl"]; 
        // make sure POSTed variable is a proper URL
        $validUrl = $this->app->getModel("Validation");
        if ($validUrl->validUrl($longUrl)) { 
            // Create a shorter link
            $shorterUrlModel = $this->app->getModel("ShorterUrl");
            $result = $shorterUrlModel->setShorterUrl($longUrl);
            $this->view->set('shortUrl', $result["shortUrl"]);
            $this->view->set('longUrl', $result["longUrl"]);
        } else {
         
            $this->view->set('error', "Not a valid URL.");
        }

    }
}

?>
