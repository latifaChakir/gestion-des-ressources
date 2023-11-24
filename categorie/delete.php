<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM categorie WHERE categorie_id='$id'";
if(mysqli_query($conn,$sql)){
   echo "categorie Deleted Successfully!";
    header("Location:categorie.php");
}else{
    die("Something went wrong");
}
}else{
    echo "categorie does not exist";
}
?>