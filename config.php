<?php
/* name of the website */
ini_set('display_errors', 1);
$app->setConfig('siteName', 'UX.BZ');
/* entries on the navigation bar */
$myToc = array( 
    "Login" => "login",
    "Create" => "create",
    "About" => "about",
      "Dump" => "dump" );
$app->setConfig('myToc', $myToc);
