<?php

ob_start();

//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/index.css";
//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation.php";
$reservationForm = "reservation-form.php";
$index = "../index.php";
//HEADER
require('../require/html_/header.php');

//FOOTER
$img_signature = 'images/netero.png';
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require('../require/html_/footer.php');
require('../libraries/controller/Inscription.php');
require('../libraries/models/Inscription.php');
?>
<main>

    <form method="POST" action="">
        <label name="login">login</label>
        <input type="text" id="ConnexionLogin" name="login">

        <label name="password">password</label>
        <input type="password" id="ConnexionPassword" name="password">

        <input type="submit" id="ConnexionSubmit" value="register" name="register">

        <?php

        if (isset($_POST['register'])) {
            var_dump($_POST);

            $newUser = new \Controller\Inscription(); // prend pas le bon
            $newUser->connect($_POST['login'], $_POST['password']);
        }

        ?>


</main>
<?php
ob_end_flush();
?>