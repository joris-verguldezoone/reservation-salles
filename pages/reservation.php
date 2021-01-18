<?php
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
        <p><?php echo $tableau[0][2];?></p>
        <p  class="alert alert-light" role="alert"><?php echo $tableau[0][3] .'<br /> '. $tableau[0][4];?></p>
        <a style="margin-left:40%; margin-top:20%;" type="button" class="btn btn-success" href="planning.php">retour</a>
    </article>
    
    
    
</main>
<?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
ob_end_flush();
?>