<?php
//LIBRARIES
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
$Http = '../libraries/Http.php';
require('../libraries/controller/Reservation.php');
require('../libraries/models/Reservation.php');
//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/reservation-form.css";
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
    
    
    <form class="block" action="" method="POST">
        <h2>Reservation</h2>
        <label name="titre">Titre</label>
        <input type="text" id="titreForm" name="titre" required>
        
        <label name="description">Description</label>
        <textarea name="description" id="description" rows="5" cols="33" required></textarea>
        
        <label name="debut">Début</label>
        <input type="datetime-local" id="debutForm" name="debut" required>
        
        <label name="fin">Fin</label>
        <input type="datetime-local" id="finForm" name="fin" required>
        
        <input type="submit" id="submitForm" name="create" value="Créer événement">
        <?php
if (isset($_POST['create'])) {
    
    $newEvent = new \Controller\Reservation(); // prend pas le bon
    $newEvent->createEvent($_POST['titre'], $_POST['description'], $_POST['debut'], $_POST['fin'], $_SESSION['utilisateur']['id']);
}
?>
    </form>
</main>
<?php
//FOOTER
$img_signature = '../images/netero.png';
require('../require/html_/footer.php');
?>