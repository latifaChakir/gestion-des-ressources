<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM ressources WHERE ressource_id='$id'";
if(mysqli_query($conn,$sql)){
   echo "user Deleted Successfully!";
    header("Location:index.php");
}else{
    die("Something went wrong");
}
}else{
    echo "ressource does not exist";
}

?>








