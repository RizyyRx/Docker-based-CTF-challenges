<?php
ob_start();//start output buffering, to handle headers properly
include "libs/load.php";

//unset the $_SESSION array
Session::unset();

//destroy session
Session::destroy();

//redirect to login page
header("Location: gamerz_arena_index.php");
ob_end_flush();//flushes output buffer, handles headers properly
?>