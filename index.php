<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Listing</title>
</head>
<body>
    <h1>Files in the Music Folder</h1>
    <ul>
        <?php
        $files = scandir(__DIR__);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "<li><a href='$file'>$file</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>
