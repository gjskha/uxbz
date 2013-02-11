<?php

/* ShorterUrl is the model class for our collection of URL redirects */

namespace Swiftlet\Models;
use \Mongo;

class ShorterUrl extends \Swiftlet\Model {

    /** getShorterUrl is the getter function for a long URL's equivalent
      * params: a long URL
      * returns: a short URL
      */
    public function getShorterUrl($longUrl) {
        $obj = $this->getCollection()->findOne(array("longUrl" => $longUrl));
        return $obj["shortUrl"];
    } 

    /** getLongerUrl is the getter function for a short URL's equivalent
      * params: a short URL
      * returns: a long URL
      */
    public function getLongerUrl($shortUrl) {
        $obj = $this->getCollection()->findOne(array("shortUrl" => $shortUrl));
        return $obj["longUrl"];
    }

    /** dumpRecords is for dumping all the records in the database
      * params: none
      * returns: an associative array
      */
    public function dumpRecords() {
        $cursor = $this->getCollection()->find();
        $dump = array();
        foreach ($cursor as $obj) {
            array_push($dump, array("longUrl" => $obj["longUrl"], "shortUrl" => $obj["shortUrl"]));
        }
        return $dump;
    }

    /** setShorterUrl is the setter function for creating a shorter link.
      * params: a url in need of shortening.
      * returns: an array with the specified url and it's short equivalent.
      */
    public function setShorterUrl($longUrl) {
           
           $shortUrl = $this->generateCandidate();
           while ( $this->getCollection()->findOne(array("shortUrl" => $shortUrl))) { 
               $shortUrl = $this->generateCandidate();
           }
           $obj = array("shortUrl" => $shortUrl, "longUrl" => $longUrl);
           $inserter = $this->getCollection();
           $inserter->insert($obj);
           // try/catch error
           return array("longUrl" => $obj["longUrl"], "shortUrl" => $obj["shortUrl"]);
    } 

    /**
      *
      *
      */
    //public function setUserLocation($ipAddr,$shortUrl) {
    public function setRequestLocation($ipAddr,$shortUrl) {
        // package called php5-geoip on ubuntu
        $geo = geoip_country_name_by_name($ipAddr);
        $obj = array( "shortUrl" => $shortUrl, 
                        "ipAddr" => $ipAddr,
                       "country" => $geo );
 
        // $this->userInformation->insert($obj);
        $this->getCollection("userInformation")->insert($obj);
    }

    /**
      *
      *
      */
    public function displayUserInfo($shortUrl) {
        return "place holder";
    }

    /** getCollection gets the desired Mongo collection 
      * parameters: a collection
      * returns: a connection to the collection
      */
    private function getCollection($collection = "urlsCollection") {
        $mongoInstance = new Mongo;
        $db = $mongoInstance->urls;
        return $db->$collection;
    }

    /** generateCandidate comes up with a possible url for redirects
      * parameters: none
      * returns: string $candidateUrl
      */
    private function generateCandidate() {

        $table = array( "a","b","c","d","e","f","g",
                        "h","i","j","k","l","m","n",
                        "o","p","q","r","s","t","u",
                        "v","w","x","y","z","-","_",
                        "A","B","C","D","E","F","G",
                        "H","I","J","K","L","M","N",
                        "O","P","Q","R","S","T","U",
                        "V","W","X","Y","Z","1","2", 
                        "3","4","5","6","7","8","9",
                        "0" );

        $random_length = rand (2,5);

        $candidateUrl = '';

        for ($i = 0; $i < $random_length + 1; $i++ ) {
            $candidateUrl = $candidateUrl . $table[array_rand($table)];
        }
    
        return $candidateUrl; 
    }
}

?>
