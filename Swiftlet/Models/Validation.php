<?php

namespace Swiftlet\Models;

class Validation extends \Swiftlet\Model {
    public function ValidUrl() {
        return 1;
        /*
The FILTER_VALIDATE_URL filter validates value as an URL.

    Name: "validate_url"
    ID-number: 273

Possible  flags:

    FILTER_FLAG_SCHEME_REQUIRED - Requires URL to be an RFC compliant URL (like http://example)
    FILTER_FLAG_HOST_REQUIRED - Requires URL to include host name (like http://www.example.com)
    FILTER_FLAG_PATH_REQUIRED - Requires URL to have a path after the domain name (like www.example.com/example1/test2/)
    FILTER_FLAG_QUERY_REQUIRED - Requires URL to have a query string (like "example.php?name=Peter&age=37")

Example 1
<?php
$url = "http://www.example.com";

if(!filter_var($url, FILTER_VALIDATE_URL))
  {
  echo "URL is not valid";
  }
else
  {
  echo "URL is valid";
  }
?> 
*/

    }
}

?>
