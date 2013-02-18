<?php
namespace Swiftlet\Controllers;

class Get extends \Swiftlet\Controller {

    public function index() {

        if ( preg_match('/\W/', $_GET['p'])) {
      
            $this->notImplemented();
        } else {
            // get param for shortUrl here.
            $shortUrl = $_GET['p'];
            $ip = getenv('REMOTE_ADDR');
            $urlModel = $this->app->getModel('Url');
            $longUrl = $urlModel->getLongerUrl($shortUrl);
    
            if (isset($longUrl)) {
                // track user data
                $geo = $this->app->getModel('Geolocate');
                $geo->setIpLocation($ip, $shortUrl);
                // redirect
                if (!headers_sent()) {
                    header('HTTP/1.1 302 Found');
                    header('Location: $longUrl');
                }
            } else {
                /* if (!headers_sent()) {
                    header('HTTP/1.1 404 Not Found');
                    header('Status: 404 Not Found');
                } */
    
                 // notImplemented();
                 //$this->notImplemented();
                 $this->app->registerHook('Navigation');
                 $this->app->serve('Error404');
            } 
       }
    }

public function notImplemented() {
    $this->app->registerHook('Navigation');
    $this->app->serve('Error404');
}

}

?>
