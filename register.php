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
$colorClass = '';

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

    $check_user_query = "SELECT * FROM useraccounts WHERE username = '$username' OR email = '$email'";
    $check_user_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
        $msg = "Ce nom d'utilisateur ou cette adresse e-mail est déjà pris.";
        $colorClass = "danger";
    } else {
        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $insert_user_query = "INSERT INTO useraccounts (username, email, password_hash) VALUES ('$username', '$email', '$hashedPassword')";
        $insert_user_result = mysqli_query($conn, $insert_user_query);

        if ($insert_user_result) {
            $msg = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            $colorClass = "success";
        } else {
            $msg = "Erreur lors de l'inscription. Veuillez réessayer.";
            $colorClass = "danger";
        }
    }
}

// Fermeture de la connexion
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Ludiflex | Login & Registration</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>MY RESSOURCES </p>
            </div>

            <div class="nav-button">

                <button class="btn" id="registerBtn"
                    onclick="window.location.href='../gestion-des-ressources/login.php'">Sign In</button>
                <button class="btn" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <div class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="../gestion-des-ressources/login.php">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <form method="post">
                    <div class="input-box">
                        <input type="text" name="username" class="input-field" placeholder="Username" required>
                        <i class="bx bx-user"></i>
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="submit" class="submit" value="Register">
                    </div>
                </form>
                <div class="field_error <?php echo $colorClass; ?>">
    <?php echo $msg; ?>
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

    body {
        background-color: #435d7d;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        overflow: hidden;
        
    }
    .field_error {
    margin-top: 15px;
}

.field_error.success {
    color: green; /* Couleur verte pour le succès */
}

.field_error.danger {
    color: red; /* Couleur rouge pour l'échec */
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

    a {
        text-decoration: none;
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