<?php

namespace Swiftlet\Controllers;

class Link extends \Swiftlet\Controller
{
    protected $title = "Your link is ready!";
		
    public function index()
    {
        $longUrl = $_POST["longUrl"]; 
        // make sure POSTed variable is a proper URL
        $validator = $this->app->getModel("Validation");
        if ($validator->validUrl($longUrl)) { 
            // Create a shorter link
            $urlModel = $this->app->getModel("Url");
            $result = $urlModel->setShorterUrl($longUrl);
            $this->view->set('shortUrl', $result["shortUrl"]);
            $this->view->set('longUrl', $result["longUrl"]);
        } else {
            $this->view->set('error', "Not a valid URL.");
        }
    }
}

?>
