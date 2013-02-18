<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
	<head>
		<title><?php echo $this->htmlEncode($this->app->getConfig('siteName')) . ' - ' . $this->get('pageTitle') ?></title>

		<link type="text/css" rel="stylesheet" href="<?php echo $this->app->getRootPath() ?>views/css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $this->app->getRootPath() ?>views/css/bootstrap-responsive.css"/>
		<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700,400italic,700italic|Archivo+Black' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Wendy+One' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="<?php echo $this->app->getRootPath() ?>views/css/layout.css"/>
		<script src="<?php echo $this->app->getRootPath() ?>views/js/bootstrap.js"></script>
		<script src="<?php echo $this->app->getRootPath() ?>views/js/jquery-1.9.1.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
	</head>
	<body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">UX.BZ</a>
          <div class="nav-collapse collapse">
            <ul class="nav">

<!--              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
            <?php 
                  foreach ($this->get('navigation') as $k) {
                      echo "<li class=\"$k[class]\"><a href=\"" . $this->app->getRootPath() . "$k[href]\">$k[anchor]</a></li>";
                  }
             ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


