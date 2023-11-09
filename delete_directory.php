<?php
$directory = "../config/";

$response = [];

if (is_dir($directory)) {
    if (@rmdir($directory)) {
        $response['status'] = 'success';
        $response['message'] = "Directory '$directory' successfully removed.";
    } else {
        $response['status'] = 'error';
        $response['message'] = "Failed to remove directory '$directory'. Check permissions.";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "Directory '$directory' does not exist.";
}

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
