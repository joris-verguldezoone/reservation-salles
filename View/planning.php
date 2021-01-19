<?php
ob_start();
//LIBRARIES
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require_once('../libraries/controller/Inscription.php');
require_once('../libraries/models/Inscription.php');
require_once('../libraries/models/Reservation.php');
require_once('../libraries/Controller/Planning.php');
//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/planning.css";
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
?>
<main>

<?php

$planning = new \Controller\Planning();
$planning->planningView();

?>
</main>
<?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
ob_end_flush();
?>