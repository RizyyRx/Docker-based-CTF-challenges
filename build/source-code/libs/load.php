<?php

//load files(templates) present inside _templates directory using file name
function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/_templates/$name.php";
}

?>