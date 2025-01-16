<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT filepath FROM songs WHERE id = $id");
    $row = $result->fetch_assoc();
    $filepath = $row['filepath'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        readfile($filepath);
        exit;
    }
}
?>
