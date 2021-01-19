<?php
//LIBRARIES
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';

require_once('../libraries/controller/Inscription.php');
require_once('../libraries/models/Inscription.php');
require_once('../libraries/models/Reservation.php');
//CSS
ob_start();
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/reservation.css";
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
<section>
<?php
$Reservation = new \Models\Reservation();
echo $Reservation->eventLink($_GET['Evenement']); // reçois un tableau contenant toutes les informations liés a l'événement

?>
</section>
</main>
<?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
ob_end_flush();
?>