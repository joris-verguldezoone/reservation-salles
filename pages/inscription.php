<?php
//PHP REQUIRE 
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/inscription.css";
$footerCss = "../css/footer.css";

//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation-form.php";
$index = "../index.php";
//HEADER
require('../require/html_/header.php');

require('../libraries/controller/Inscription.php');
require('../libraries/models/Inscription.php');

?>

<main>

    <section>
            <form class="block" method="POST" action="">
            <h2>Inscription</h2>

                <label name="login">Login</label>
                <input type="text" id="inscriptionLogin" name="login"><br />

                <label name="password">Password</label>
                <input type="password" id="inscriptionPassword" name="password"><br />

                <label name="confirm_password">Confirm password</label>
                <input type="password" id="inscriptionConfirm_password" name="confirm_password"><br />

                <input style="margin-bottom:30px;" type="submit" id="inscriptionSubmit" value="register" name="register">
            </form>
                <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Inscription(); // prend pas le bon
    $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password']);
}

?>

        </form>
    </section>

    </main>
    <?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
?>