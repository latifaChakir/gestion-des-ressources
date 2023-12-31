<?php

$dbName = "brief1_sql";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
   die("Something went wrong");
}

$msg = '';
if (isset($_POST['username']) && isset($_POST['password'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   session_start();
   $query = "SELECT * FROM useraccounts WHERE username = '$username'";
   $result = mysqli_query($conn, $query);

   if ($result) {
      if(mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $hashedPassword = $row['password_hash'];

         if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            header('location: ../gestion-des-ressources/users/index.php');
            die();
         } else {
            $msg = "Incorrect password";
         }
      } else {
         $msg = "Username not found";
      }
   } else {
      $msg = "Query failed";
   }

   $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <title>Ludiflex | Login & Registration</title>
</head>

<body>
   <div class="wrapper">
      <nav class="nav">
         <div class="nav-logo">
            <p>MY RESSOURCES</p>
         </div>

         <div class="nav-button">
            <button class="btn white-btn" id="loginBtn">Sign In</button>
            <button class="btn" id="registerBtn"
               onclick="window.location.href='../gestion-des-ressources/register.php'">Sign Up</button>
         </div>
         <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
         </div>
      </nav>

      <!----------------------------- Form box ----------------------------------->
      <div class="form-box">

         <!------------------- login form -------------------------->

         <div class="login-container" id="login">
            <div class="top">
               <span>Don't have an account? <a href="../gestion-des-ressources/register.php">Sign Up</a></span>
               <header>Login</header>
            </div>
            <form method="post">
               <div class="input-box">
                  <input type="text" name="username" class="input-field" placeholder="Username" required>
                  <i class="bx bx-user"></i>
               </div>
               <div class="input-box">
                  <input type="password" name="password" class="input-field" placeholder="Password">
                  <i class="bx bx-lock-alt"></i>
               </div>
               <div class="input-box">
                  <input type="submit" class="submit" value="Sign In">
               </div>
            </form>
            <div class="field_error">
               <?php echo $msg ?>
            </div>

         </div>



      </div>
   </div>
</body>
<style>
   /* POPPINS FONT */
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
   }

   a {
      text-decoration: none;
   }

   body {
      background-color: #435d7d;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      overflow: hidden;
   }

   .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 110vh;
      background: rgba(39, 39, 39, 0.4);
   }

   .nav {
      position: fixed;
      top: 0;
      display: flex;
      justify-content: space-around;
      width: 100%;
      height: 100px;
      line-height: 100px;
      background: linear-gradient(rgba(39, 39, 39, 0.6), transparent);
      z-index: 100;
   }

   .nav-logo p {
      color: white;
      font-size: 25px;
      font-weight: 600;
   }

   .nav-menu ul {
      display: flex;
   }

   .nav-menu ul li {
      list-style-type: none;
   }

   .nav-menu ul li .link {
      text-decoration: none;
      font-weight: 500;
      color: #fff;
      padding-bottom: 15px;
      margin: 0 25px;
   }

   .link:hover,
   .active {
      border-bottom: 2px solid #fff;
   }

   .nav-button .btn {
      width: 130px;
      height: 40px;
      font-weight: 500;
      background: rgba(255, 255, 255, 0.4);
      border: none;
      border-radius: 30px;
      cursor: pointer;
      transition: .3s ease;
   }

   .btn:hover {
      background: rgba(255, 255, 255, 0.3);
   }

   #registerBtn {
      margin-left: 15px;
   }

   .btn.white-btn {
      background: rgba(255, 255, 255, 0.7);
   }

   .btn.btn.white-btn:hover {
      background: rgba(255, 255, 255, 0.5);
   }

   .nav-menu-btn {
      display: none;
   }

   .field_error {
      color: red;
      margin-top: 15px;
   }

   .form-box {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 512px;
      height: 420px;
      overflow: hidden;
      z-index: 2;
   }

   .login-container {
      position: absolute;
      left: 4px;
      width: 500px;
      display: flex;
      flex-direction: column;
      transition: .5s ease-in-out;
   }

   .register-container {
      position: absolute;
      right: -520px;
      width: 500px;
      display: flex;
      flex-direction: column;
      transition: .5s ease-in-out;
   }

   .top span {
      color: #fff;
      font-size: small;
      padding: 10px 0;
      display: flex;
      justify-content: center;
   }

   .top span a {
      font-weight: 500;
      color: #fff;
      margin-left: 5px;
   }

   header {
      color: #fff;
      font-size: 30px;
      text-align: center;
      padding: 10px 0 30px 0;
   }

   .two-forms {
      display: flex;
      gap: 10px;
   }

   .input-field {
      font-size: 15px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      height: 50px;
      width: 100%;
      padding: 0 10px 0 45px;
      border: none;
      border-radius: 30px;
      outline: none;
      transition: .2s ease;
   }

   .input-field:hover,
   .input-field:focus {
      background: rgba(255, 255, 255, 0.25);
   }

   ::-webkit-input-placeholder {
      color: #fff;
   }

   .input-box i {
      position: relative;
      top: -35px;
      left: 17px;
      color: #fff;
   }

   .submit {
      font-size: 15px;
      font-weight: 500;
      color: black;
      height: 45px;
      width: 100%;
      border: none;
      border-radius: 30px;
      outline: none;
      background: rgba(255, 255, 255, 0.7);
      cursor: pointer;
      transition: .3s ease-in-out;
   }

   .submit:hover {
      background: rgba(255, 255, 255, 0.5);
      box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
   }

   .two-col {
      display: flex;
      justify-content: space-between;
      color: #fff;
      font-size: small;
      margin-top: 10px;
   }

   .two-col .one {
      display: flex;
      gap: 5px;
   }

   .two label a {
      text-decoration: none;
      color: #fff;
   }

   .two label a:hover {
      text-decoration: underline;
   }

   @media only screen and (max-width: 786px) {
      .nav-button {
         display: none;
      }

      .nav-menu.responsive {
         top: 100px;
      }

      .nav-menu {
         position: absolute;
         top: -800px;
         display: flex;
         justify-content: center;
         background: rgba(255, 255, 255, 0.2);
         width: 100%;
         height: 90vh;
         backdrop-filter: blur(20px);
         transition: .3s;
      }

      .nav-menu ul {
         flex-direction: column;
         text-align: center;
      }

      .nav-menu-btn {
         display: block;
      }

      .nav-menu-btn i {
         font-size: 25px;
         color: #fff;
         padding: 10px;
         background: rgba(255, 255, 255, 0.2);
         border-radius: 50%;
         cursor: pointer;
         transition: .3s;
      }

      .nav-menu-btn i:hover {
         background: rgba(255, 255, 255, 0.15);
      }
   }

   @media only screen and (max-width: 540px) {
      .wrapper {
         min-height: 100vh;
      }

      .form-box {
         width: 100%;
         height: 500px;
      }

      .register-container,
      .login-container {
         width: 100%;
         padding: 0 20px;
      }

      .register-container .two-forms {
         flex-direction: column;
         gap: 0;
      }
   }
</style>


<script>

   function myMenuFunction() {
      var i = document.getElementById("navMenu");

      if (i.className === "nav-menu") {
         i.className += " responsive";
      } else {
         i.className = "nav-menu";
      }
   }

</script>

</body>

</html>