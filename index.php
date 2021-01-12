<?php

$Http = 'libraries/Http.php';
$database = 'libraries/database.php';
$utils = 'libraries/utils.php';

require('libraries/controller/Inscription.php');
require('libraries/models/Inscription.php');


//CSS
$bootstrap = "css/bootstrap.min.css";
$headerCss = "css/header.css";
$pagesCss = "css/index.css";
//PATHS
$index = "index.php";
$inscription = "pages/inscription.php";
$connexion = "pages/connexion.php";
$profil = "pages/profil.php";
$planning = "pages/planning.php";
$reservation = "pages/reservation.php";
$reservationForm = "pages/reservation-form.php";
require('require/html_/header.php');

ob_start();
?>
<main>

    <section id="content">
        <h1>Coucou</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae aut placeat autem inventore quibusdam officia voluptates iste reprehenderit ex, dignissimos, sed perferendis tempore commodi veritatis nostrum quaerat id nemo iusto!</p>
        <h2>Nos différentes salles</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod nobis, excepturi voluptas soluta voluptatem dicta voluptatum perferendis dolorem iure repellendus laborum ullam libero est blanditiis, animi, iste suscipit asperiores veritatis.</p>
        <h2>Nos Tarifs</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi reiciendis hic tempore repellat expedita accusantium magni aliquam voluptas incidunt cum, iste natus pariatur voluptates nostrum animi ipsa ducimus earum?</p>
        <h2>Notre équipe</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum excepturi eos, unde laudantium omnis dicta. Explicabo, culpa placeat maxime maiores accusamus, iure debitis saepe velit voluptatum nesciunt laudantium soluta error!</p>
    </section>

    <section id="room">
        <article class="article_salles">
            <img class="img_salles" alt="minas Tirith" src="images/minasTirith.jpg">
            <img class="img_salles" alt="GameofThrones" src="images/gameOfThrones.jpg">
        </article>
        <article class="article_salles">
            <img class="img_salles" alt="Minecraft eclaté o sol" src="images/minecraftRoom.jpg">
            <img class="img_salles" alt="Nostromo <3" src="images/nostromo.jpg">
        </article>

    </section>
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
                $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password']);
            }

            ?>

        </form>
    </section>
</main>

<?php
$img_signature = 'images/netero.png';
require('require/html_/footer.php');
ob_end_flush()
?>