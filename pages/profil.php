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
require('../require/html_/footer.php');

//LIBRARIES
$Http = "../libraries/Http.php";

$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require('../libraries/controller/Inscription.php');
require('../libraries/models/Inscription.php');
require('../require/html_/footer.php');

?>
<section>
        <form method="POST" action="">
            <label name="login">login</label>
            <input type="text" id="inscriptionLogin" name="login">

            <label name="password">password</label>
            <input type="password" id="inscriptionPassword" name="password">

            <label name="confirm_password">confirm password</label>
            <input type="password" id="inscriptionConfirm_password" name="confirm_password">

            <input type="submit" id="inscriptionSubmit" value="register" name="register">

            <?php

            if (isset($_POST['register'])) {
                var_dump($_POST);

                $newUser = new \Controller\Inscription(); // prend pas le bon
                $newUser->profil($_POST['login'], $_POST['password'], $_POST['confirm_password']);
            }

            ?>

        </form>
    </section>
    <?php
    ob_end_flush();
    ?>