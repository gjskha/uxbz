<?php

/* Url is the model class for our collection of URL redirects */

namespace Swiftlet\Models;

class Url extends \Swiftlet\Model {

    /** getShorterUrl is the getter function for a long URL's equivalent
      * params: a long URL
      * returns: a short URL
      */
    public function getShorterUrl($longUrl) {
        $obj = $this->getCollection()->findOne(array('longUrl' => $longUrl));
        return $obj['shortUrl'];
    } 

    /** getLongerUrl is the getter function for a short URL's equivalent
      * params: a short URL
      * returns: a long URL
      */
    public function getLongerUrl($shortUrl) {
        $obj = $this->getCollection()->findOne(array('shortUrl' => $shortUrl));
        return $obj['longUrl'];
    }

    /** dumpRecords is for dumping all the records in the database
      * params: none
      * returns: an associative array
      */
    public function dumpRecords($page = 1, $sort = 'time', $order = -1) {

        $collection = $this->getCollection();
        $count = $collection->find()->count();
        
        $pages = $this->app->getModel('Pagination')->Page($count, $page); 
        
        $cursor = $collection->find();
        $cursor->limit($this->app->getConfig('itemsPerPage'));
        $cursor->skip($pages['skip']);
        // 1, -1 asc desc
        $cursor->sort(array($sort => $order));

        $dump = array();
        foreach ($cursor as $obj) {
            array_push($dump, array('time' => $obj['time'], 'longUrl' => $obj['longUrl'], 'shortUrl' => $obj['shortUrl']));
        }

        array_push($dump, $pages);

        return $dump;
    }

    /** setShorterUrl is the setter function for creating a shorter link.
      * params: a url in need of shortening.
      * returns: an array with the specified url and it's short equivalent.
      */
    public function setShorterUrl($longUrl) {
           
           $shortUrl = $this->generateCandidate();
           while ($this->getCollection()->findOne(array('shortUrl' => $shortUrl))) { 
               $shortUrl = $this->generateCandidate();
           }
           $obj = array('shortUrl' => $shortUrl, 'longUrl' => $longUrl, 'time' => new \MongoDate);
           $inserter = $this->getCollection();
           $inserter->insert($obj);
           // error handling
           return array('longUrl' => $obj['longUrl'], 'shortUrl' => $obj['shortUrl']);
    } 

    /** getCollection gets the desired Mongo collection 
      * parameters: a collection
      * returns: a connection to the collection
      */
    public function getCollection($collection = 'urlsCollection') {
        return $this->app->getModel('DB')->getCollection($collection);
    }

    /** generateCandidate comes up with a possible url for redirects
      * parameters: none
      * returns: string $candidateUrl
      */
    private function generateCandidate() {

        $table = array( 'a','b','c','d','e','f','g',
                        'h','i','j','k','l','m','n',
                        'o','p','q','r','s','t','u',
                        'v','w','x','y','z','_','0',
                        'A','B','C','D','E','F','G',
                        'H','I','J','K','L','M','N',
                        'O','P','Q','R','S','T','U',
                        'V','W','X','Y','Z','1','2', 
                        '3','4','5','6','7','8','9', );

        $random_length = rand (2,5);

        $candidateUrl = '';

        for ($i = 0; $i < $random_length + 1; $i++ ) {
            $candidateUrl = $candidateUrl . $table[array_rand($table)];
        }
    
        return $candidateUrl; 
    }
}

?>
