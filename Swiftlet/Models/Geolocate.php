<?php

namespace Swiftlet\Models;

class Geolocate extends \Swiftlet\Model
{
    /**
      *
      *
      */
    public function setIpLocation($ipAddr,$shortUrl) {
        // package called php5-geoip on ubuntu
        /*
        $geo = geoip_country_name_by_name($ipAddr);
        $obj = array( 'shortUrl' => $shortUrl, 
                        'ipAddr' => $ipAddr,
                       'country' => $geo );
 
        $this->getCollection('userInformation')->insert($obj);
        */
         
        $ipAddr = '4.5.6.7'; //testing 

        $geoip = \Net_GeoIP::getInstance('/var/www/uxbz/data/GeoLiteCity.dat'); 
  
        $location = $geoip->lookupLocation($ipAddr);           
            
        $snoop = array(
            'ipAddr' => $ipAddr,
            'shortUrl' => $shortUrl,
            'countryName' => $location->countryName,
            'city' => $location->city,
            'latitude' => $location->latitude,
            'longitude' => $location->longitude 
        );

        $db = $this->app->getModel('DB');
        $inserter = $db->getCollection('userInformation');
        $inserter->insert($snoop);
    }

}

?>
