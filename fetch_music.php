<?php
include 'db_config.php';

$sql = "SELECT * FROM library";
$result = $conn->query($sql);

$musicData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $musicData[] = $row;
    }
}

echo json_encode($musicData);
$conn->close();
?>
