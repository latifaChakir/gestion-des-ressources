<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM subcategory WHERE sub_categorie_id='$id'";
if(mysqli_query($conn,$sql)){
   echo "user Deleted Successfully!";
    header("Location:subCategorie.php");
}else{
    die("Something went wrong");
}
}else{
    echo "user does not exist";
}

?>








