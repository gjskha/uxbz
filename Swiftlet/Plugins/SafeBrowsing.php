<?php

namespace Swiftlet\Plugins;

class SafeBrowsing extends \Swiftlet\Plugin {
    public function actionAfter() {
        
        if ( get_class($this->controller) === ('Swiftlet\Controllers\Get'||'Swiftlet\Controllers\Create') ) {
            echo "Safebrowsing Plugin in Get or Create"; 
        }
    }
}

?>
