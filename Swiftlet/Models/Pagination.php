<?php

namespace Swiftlet\Models;

class Pagination extends \Swiftlet\Model {

    public function Page($itemCount = 0, $wantedPage = 1) {
        
        $totalPages = ceil($itemCount / $this->app->getConfig('itemsPerPage'));
        $skip = (($wantedPage - 1) * $this->app->getConfig('itemsPerPage'));
         
        $pages = array(
            "skip" => $skip,
            "totalPages" => $totalPages,
            "wantedPage" => $wantedPage,
            "nextPage" => $wantedPage + 1,
            "prevPage" => $wantedPage - 1
        );
        return $pages; 
    }
}

?>
