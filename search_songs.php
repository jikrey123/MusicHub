<?php
header('Content-Type: application/json'); // Ensure JSON response

$conn = new mysqli("localhost", "root", "", "music_website");

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = trim($_GET['query']);
    if (strlen($query) < 3) {
        echo json_encode(["error" => "Search query too short"]);
        exit;
    }

    $sql = "SELECT title, artist, genre, file_path FROM songs 
            WHERE title LIKE ? OR artist LIKE ? OR genre LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $songs = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($songs);
    } else {
        echo json_encode(["error" => "Failed to execute query"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
?>
