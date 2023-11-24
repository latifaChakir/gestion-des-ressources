<?php
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $_POST['name_categorie'];
    $subCategoryName = $_POST['name_sub_categorie'];

    $categoryQuery = "SELECT categorie_id FROM categorie WHERE name_categorie = '$categoryName'";
    $categoryResult = $conn->query($categoryQuery);

    if (!$categoryResult) {
        die("Error: " . $categoryQuery . "<br>" . $conn->error);
    }

    $categoryRow = $categoryResult->fetch_assoc();
    $categoryID = $categoryRow['categorie_id'];

   
    $sql = "INSERT INTO subcategory (categorie_id, name_sub_categorie) VALUES ('$categoryID','$subCategoryName')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: subCategorie.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
