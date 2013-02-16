<?php

/* configurable variables go here. */

/* name of the website */
$app->setConfig('siteName', 'UX.BZ');
$app->setConfig('siteHost', 'localhost');

/* database information */
$app->setConfig('dbName', 'urls');

/* entries on the navigation bar */
$app->setConfig('myToc', 
     array('Login' => 'login',
          'Create' => 'create',
           'About' => 'about',
           'Abuse' => 'abuse',
            'Dump' => 'dump' ));

/* entries per screen for tabular data */
$app->setConfig('itemsPerPage', 10);
