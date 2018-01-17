<?php

//require the autoload file
require_once ('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new View();
    echo $view ->render("pages/home.html");
});

//Run Fat-Free
$f3->run();

