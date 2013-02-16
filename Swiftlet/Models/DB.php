<?php

/* DB is the model class for our database connections */

namespace Swiftlet\Models;
use \Mongo;

class DB extends \Swiftlet\Model {

    /** getCollection gets the desired Mongo collection 
      * parameters: a collection
      * returns: a connection to the collection
      */
    public function getCollection($collection = 'urlsCollection') {
        $mongoInstance = new Mongo;
        $dbName = $this->app->getConfig('dbName');
        return $mongoInstance->$dbName->$collection;
    }
}

?>
