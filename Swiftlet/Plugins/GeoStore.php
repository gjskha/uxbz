<?php

namespace Swiftlet\Plugins;

class GeoStore extends \Swiftlet\Plugin {
    public function actionAfter() {
        if ( get_class($this->controller) === 'Swiftlet\Controllers\Get' ) {}
    }
}

?>
