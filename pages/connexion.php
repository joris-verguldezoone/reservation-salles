<?php

ob_start();

//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/connexion.css";
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

//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require('../libraries/controller/Connexion.php');
require('../libraries/models/Connexion.php');
?>
<main>
        <form class="block" method="POST" action="">
        <h2>Connexion</h2>

            <label name="login">login</label>
            <input type="text" id="ConnexionLogin" name="login">

            <label name="password">password</label>
            <input type="password" id="ConnexionPassword" name="password">

            <input type="submit" id="ConnexionSubmit" value="register" name="register">
        </form>
        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Connexion(); // prend pas le bon
    $newUser->connect($_POST['login'], $_POST['password']);
}

?>


</main>
<?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
ob_end_flush();
?>