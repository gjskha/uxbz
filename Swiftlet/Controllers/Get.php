<?php
namespace Swiftlet\Controllers;

class Get extends \Swiftlet\Controller {
    //protected $title = "Getting link..."; 

    public function index() {
        

        // get param for shortUrl here.
        $shortUrl = $_GET["p"];

        // make sure shortUrl is only alnum

        $urlModel = $this->app->getModel("Url");
        $longUrl = $urlModel->getLongerUrl($shortUrl);

        if (isset($longUrl)) {
            // redirect
            if (!headers_sent()) {
                header("HTTP/1.1 302 Found");
                header("Location: $longUrl");
            }
            // track user data
        } else {
            if (!headers_sent()) {
                header("HTTP/1.1 404 Not Found");
                header("Status: 404 Not Found");
            }
        }
    }
}

?>
