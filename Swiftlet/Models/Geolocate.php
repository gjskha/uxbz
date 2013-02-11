<?php

namespace Swiftlet\Models;

class Geolocate extends \Swiftlet\Model
{
    /**
      *
      *
      */
    public function setRequestLocation($ipAddr,$shortUrl) {
        // package called php5-geoip on ubuntu
        $geo = geoip_country_name_by_name($ipAddr);
        $obj = array( "shortUrl" => $shortUrl, 
                        "ipAddr" => $ipAddr,
                       "country" => $geo );
 
        $this->getCollection("userInformation")->insert($obj);
    }

}

?>
