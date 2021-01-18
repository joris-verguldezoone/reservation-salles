<?php

$Http = 'libraries/Http.php';
$database = 'libraries/database.php';
$utils = 'libraries/utils.php';




//CSS
$bootstrap = "css/bootstrap.min.css";
$headerCss = "css/header.css";
$pagesCss = "css/index.css";
$footerCss = "css/footer.css";;
//PATHS
$index = "index.php";
$inscription = "pages/inscription.php";
$connexion = "pages/connexion.php";
$profil = "pages/profil.php";
$planning = "pages/planning.php";
$reservation = "pages/reservation.php";
$reservationForm = "pages/reservation-form.php";
require('require/html_/header.php');

?>
<main>

    <section id="content">
        <h1>Coucou</h1>
        <p>Le mot coucou est un terme du vocabulaire courant se différenciant du Lorem ipsum puisque je suis aller le chercher sur google et peut désigner différentes espèces d'oiseaux ayant généralement un chant qui correspond à l'onomatopée « coucou ». Ce nom ne correspond donc pas à un niveau précis de la classification scientifique des espèces. </h2>
        <h2>Nos Tarifs</h2>
        <p>10€ de l'heure</p>
        <h2>Notre équipe</h2>
        <p>Onet 2.0 va nettoyer derriere vous, le service compta vous factuera vos séance et le directeur se la coullera douce</p>
    </section>

    <section id="room">

        <article class="article_salles">
            <img class="img_salles" alt="Minecraft eclaté o sol" src="images/minecraftRoom.jpg">
        </article>

    </section>

</main>

<?php
$img_signature = 'images/netero.png';
require('require/html_/footer.php');
?>