<?php
include('connect.php');
$name = $_POST['name_categorie'];


// Insert data into the database
$sql = "INSERT INTO categorie (name_categorie) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    header("Location: categorie.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>