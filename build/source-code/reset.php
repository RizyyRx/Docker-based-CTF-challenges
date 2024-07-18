<?php
ob_start(); // Start output buffering to handle headers properly
include "libs/load.php";

try {
    Database::resetProgress();
    // Redirect to index.php after processing
    header("Location: index.php");
    exit(); // Ensure script stops executing after redirection
} catch (Exception $e) {
    // Handle exceptions
    error_log('Error resetting progress: ' . $e->getMessage());
    // Redirect to an error page or handle the error as needed
    header("Location: error_page.php");
    exit();
}

ob_end_flush(); // Flush output buffer to handle headers properly
