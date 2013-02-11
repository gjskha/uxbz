<?php

namespace Swiftlet\Plugins;

class Navigation extends \Swiftlet\Plugin {
    
    /**
     * Implementation of the actionAfter hook
     */
    public function actionAfter() {

        //if ( get_class($this->controller) === 'Swiftlet\Controllers\Index' ) {
            //$this->view->set('helloWorld', $helloWorld . ' This string was altered by ' . __CLASS__ . '.');
        //}

        if ( get_class($this->controller) === 'Swiftlet\Controllers\Link' ) {
            //check for stale link            
            $longUrl = $this->view->get('longUrl');
            if (! isset($longUrl)) {
                //  
            }
        }

        $navigation = $this->view->get('navigation');
        if (! isset($navigation)) {
            $navigation = $this->app->getModel('navigation')->Navbar();
            $this->view->set('navigation', $navigation);
        }
    }
}
?>
