<?php
//include classes
include_once 'libs/Classes/Database.class.php';
include_once 'libs/Classes/Session.class.php';
include_once 'libs/Classes/User.class.php';

//start session
Session::start();

//load files(templates) present inside _templates directory using file name
function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/_templates/$name.php";
}

?>