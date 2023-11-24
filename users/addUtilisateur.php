<?php
include('connect.php');
$name = $_POST['nom'];
$email = $_POST['email'];


// Insert data into the database
$sql = "INSERT INTO utilisateur (nom, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>