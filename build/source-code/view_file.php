<?php
ob_start();//start output buffering, to handle headers properly
include "libs/load.php";

// Get the file parameter from the URL
$file = $_GET['file'];

// Construct the file path
$filePath = 'files/home1/home2/home3/home4/home5/home6/' . $file;

// Check if the file exists
if (file_exists($filePath)) {
    // Read and output the file contents
    $content = file_get_contents($filePath);
    echo "<pre>$content</pre>";
} else {
    echo "File not found.";
}

ob_end_flush();//flushes output buffer, handles headers properly?>