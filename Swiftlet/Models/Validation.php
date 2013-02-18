<?php

namespace Swiftlet\Models;

class Validation extends \Swiftlet\Model {

    public function Url($input) {
        if(!filter_var($input, FILTER_VALIDATE_URL,FILTER_FLAG_SCHEME_REQUIRED)) {
            return 0;
        } else {
            return 1;
        }
    }

    public function Number($input) {
        if(!filter_var($input, FILTER_VALIDATE_INT)) {
            return 0;
        } else {
            return 1;
        }
    }
}

?>
