<?php
//CSS
ob_start();
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/reservation.css";
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
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';

require_once('../libraries/controller/Inscription.php');
require_once('../libraries/models/Inscription.php');
require_once('../libraries/models/Reservation.php');


?>
<main>
<?php
$Reservation = new \Models\Reservation();
$tableau =$Reservation->eventLink($_GET['Evenement']);

$login = "";
$titre = "";
$debut = "";
$fin = "";
$description = "";

// foreach($tableau AS $value){
//     $login = $value['login'];
//     $titre = $value['titre'];
//     $debut = $value['debut'];
//     $fin = $value['fin'];
//     $description = $value['description'];
// }
// echo $login, $titre, $debut, $fin, $description;

?>
<section>
<article>
<h1><?php echo $tableau[0][0];?> </h1>
<h2><?php echo $tableau[0][1];?> </h2>
<p><?php echo $tableau[0][2], $tableau[0][3];?></p>
</article>
<article>
    <p><?php $tableau[0][4];?></p>
</article>


</main>
<?php
ob_end_flush();
?>