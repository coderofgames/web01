<?php
// Start the session


require 'config/paths.php';
require 'config/database.php';
require 'libs/session.php';

require 'libs/model.php';
require 'libs/view.php';
require 'libs/controller.php';
require 'route.php';

$route = new Route();
//$route->add('/');
$route->add('/about');
$route->add('/contact');
$route->add('/error');
$route->add('/help');
$route->add('/index');
$route->add('/login');
$route->add('/dashboard');
//echo('<pre>');
//print_r($route);
if( isset($_POST['text'] ))
    echo $_POST['text'];

$route->submit();

 