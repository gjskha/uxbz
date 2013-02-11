<?php

namespace Swiftlet\Models;

 /* Navigation is the model class for the website's navigation bar */
class Navigation extends \Swiftlet\Model
{
       /** Navbar associates each entry in the navigation with an appropriate css class
         * params: an string representing an entry
         * returns: an array that will be passed on to the views layer
         */
	public function Navbar($active = "dummyval")
	{
		$navigation = array();
                foreach ($this->app->getConfig('myToc') as $k => $v) 
                {
                    if ( $k == $active ) {
                        $class = "active";
                    } else {
                        $class = "inactive";
                    }

                    $subNavArray = array( 
                        "anchor" => $k, 
                          "href" => $v, 
                         "class" => $class 
                    );

                    array_push($navigation, $subNavArray);
                }                               
                unset($subNavArray);
		return $navigation;
	}
}

?>
