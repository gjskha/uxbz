<?php

// Use the Fat-Free Framework
require_once __DIR__.'/lib/base.php';

/**
	Setting the Fat-Free global variable DEBUG to zero will suppress stack
	trace in HTML error page. If you're still debugging your application,
	you might want to give it a value from 1 to 3. Adjust to your desired
	level of verbosity. The stack trace can help a lot in program testing.
**/
F3::set('DEBUG',3);

// Path to our templates
F3::set('GUI','gui/');

// Another way of assigning values to framework variables
F3::mset(
	array(
		'site'=>'URL-Shortening Demo',
		'host'=>$_SERVER['HTTP_HOST']
	)
);

/**
	We really don't need a SQL database for this application. The code
	just shows you how to use the Axon ORM and SQL handler.
**/

/**
	Create database connection; The demo database is within our Web
	directory but for production use, a non-Web accessible path is highly
	recommended for better security.
**/
F3::set('data','db/urls.db');

/**
	Fat-Free allows you to use any database engine (provided PHP is set up
	with the appropriate module) - you just need the DSN so the framework
	knows how to communicate with it. Migrating to another engine should be
	next to easy. If you stick to the standard SQL92 command set (no engine-
	specific extensions), you just have to change the next line. For this
	demo, we'll use the SQLite engine, so there's no need to install MySQL
	on your server.
**/
F3::set('DB',new DB('sqlite:{{@data}}'));
if (!file_exists(F3::get('data')))
	// SQLite database doesn't exist; create it programmatically
	DB::sql(
		'CREATE TABLE urls ('.
			'short TEXT PRIMARY KEY,'.
			'long TEXT,'.
			'hits INTEGER'.
		');'
	);

/**
	IMPORTANT:
	It really isn't good programming practice to combine your model and
	controller in a single file as we're doing here, because it violates
	the fundamental principle of MVC: separation of concerns.

	It's all right if you're still figuring out the structural layout of
	your application, but don't trade off coding convenience for good
	programming habits.
**/

/**
	Let's define our routes (HTTP method and URI) and route handlers;
	Unlike other frameworks, Fat-Free's code elegance makes it easy for
	novices and experts alike to understand what these lines do.
**/
F3::route(
	'GET /',
	function() {
		F3::set('template','home');
		// layout.htm is located in the directory pointed to by the
		// GUI global variable
		echo Template::serve('layout.htm');
	}
);

// Handle submission of long URL
F3::route(
	'POST /',
	function() {
		// Validate the fields in the form submitted
		F3::call('validate');
		if (!F3::exists('message')) {
			// No error; Create a hash code for the long URL
			$hash=base_convert(
				sprintf('%u',crc32(F3::get('REQUEST.long'))),10,36
			);
			// Find out if a record already exists in the database
			// Use the Axon mini-ORM so we don't have to use SQL
			$url=new Axon('urls');
			// Parameterized query
			$url->load(array('short=:hash',array(':hash'=>$hash)));
			if ($url->dry()) {
				// URL not found; Hydrate our Axon
				$url->short=$hash;
				$url->long=$_POST['long'];
			}
			$url->hits++;
			// Axon ORM takes care of both record inserts/updates so we
			// don't have to worry about it
			$url->save();
			// Pass the short URL to the template
			F3::set('short',$hash);
			// Insert result.htm in layout.htm
			F3::set('template','result');
		}
		else
			// User input error; Insert home.htm instead
			F3::set('template','home');
		// Use layout.htm here too but with a different template insert
		echo Template::serve('layout.htm');
	}
);

// Minify CSS; and cache the result for 60 seconds
F3::route(
	'GET /min',
	function() {
		if (isset($_GET['base']) && isset($_GET['files'])) {
			$_GET=F3::scrub($_GET);
			Web::minify($_GET['base'],explode(',',$_GET['files']));
		}
	},
	60
);

// URL rerouter
F3::route(
	'GET /url/@short',
	function() {
		// Retrieve long URL
		$url=new Axon('urls');
		// Parameterized query
		$url->load(
			array('short=:hash',array(':hash'=>F3::get('PARAMS.short')))
		);
		if (!$url->dry())
			// Redirect to the actual Web page
			F3::reroute($url->long);
		else
			// Short URL does not exist in database; display 404 page
			F3::error(404);
	}
);

// Execute application
F3::run();

/**
	Although allowed by Fat-Free, functions like the one below should not be
	embedded in your router/controller because they pollute the global
	namespace. In addition, the separation of the controller component and
	the business logic becomes blurred when we do this - not good MVC
	practice.

	We're doing it here only so you understand how your application interacts
	with Fat-Free. Normally, you should have functions like this inside
	import files where business logic belongs.
**/
function validate() {
	// Input validator for the 'long' field
	F3::input('long',
		function($value) {
			// Value has already been stripped of HTML tags at this point
			if (empty($value))
				F3::set('message','URL should not be blank');
			elseif (strlen($value)>150)
				F3::set('message','URL is too long');
			// Check against regex pattern for valid URL
			elseif (!Data::validurl($value))
				F3::set('message','Invalid URL');
		}
	);
}
