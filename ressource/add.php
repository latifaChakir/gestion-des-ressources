<?php
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ressouceName=$_POST['name_ressource'];
    $categoryName = $_POST['name_categorie'];
    $subCategoryName = $_POST['name_sub_categorie'];

    $categoryQuery = "SELECT categorie_id FROM categorie WHERE name_categorie = '$categoryName'";
    $categoryResult = $conn->query($categoryQuery);

    if (!$categoryResult) {
        die("Error: " . $categoryQuery . "<br>" . $conn->error);
    }

    $categoryRow = $categoryResult->fetch_assoc();
    $categoryID = $categoryRow['categorie_id'];
    //subCategorie
    $subcategoryQuery = "SELECT sub_categorie_id FROM subcategory WHERE name_sub_categorie = '$subCategoryName'";
    $subcategoryResult = $conn->query($subcategoryQuery);

    if (!$subcategoryResult) {
        die("Error: " . $subcategoryQuery . "<br>" . $conn->error);
    }

    $subcategoryRow = $subcategoryResult->fetch_assoc();
    $subcategoryID = $subcategoryRow['sub_categorie_id'];

   
    $sql = "INSERT INTO ressources (categorie_id,sub_categorie_id, name_ressource) VALUES ('$categoryID','$subcategoryID','$ressouceName')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
