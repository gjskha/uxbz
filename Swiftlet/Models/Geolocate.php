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
         
        $tArray = array('24.48.56.12', '24.24.24.24','1.2.3.4', '88.88.88.88', '44.44.44.44', '4.5.6.7'); //testing 

        $ipAddr = $tArray[array_rand($tArray)];
 
        $geoip = \Net_GeoIP::getInstance('/var/www/uxbz/data/GeoLiteCity.dat'); 
  
        $location = $geoip->lookupLocation($ipAddr);           
            
        $snoop = array(
            'ipAddr' => $ipAddr,
            'shortUrl' => $shortUrl,
            'countryName' => $location->countryName,
            'city' => $location->city,
            'time' => new \MongoDate(),
            'latitude' => $location->latitude,
            'longitude' => $location->longitude 
        );

        $db = $this->app->getModel('DB');
        $inserter = $db->getCollection('userInformation');
        $inserter->insert($snoop);
    }

}

?>
