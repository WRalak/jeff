<?php
include 'db_connect.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Price: " . $row["price"] . "<br>";
    }
} else {
    echo "No products found.";
}


$conn->close();
?>
