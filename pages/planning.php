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
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';

require_once('../libraries/controller/Inscription.php');
require_once('../libraries/models/Inscription.php');

?>
<main>

<?php
// a faire sous forme de class
date_default_timezone_set('Europe/Paris'); // fuseau horaire


$DateTime = new DateTime('NOW'); // ajd
$dayInYear = 0; // incrementation des jours
$day = 0; // durée en seconde ->seTimeStamp()


while($dayInYear < 364 ){
    if($dayInYear % 7 === 0)
    {
        echo '<table> tableau créer';
    } 
        $DateTime->setTimestamp(time()+$day*$dayInYear);
        echo '<th style="background-color:teal; padding:20px;"> '.$DateTime->format('d-m-Y') .'</th>'; // doit avoir la date actuelle
        $day = 86400;
        $dayInYear++; 

    $dateTime = 0;// peut etre fixer a 8h valeur de
    for($i=0;$i<7;$i++){ // peut etre fixer a 19h valeur de fin 
        // if($dateTime === 0)
        // {    
        //     echo '<tr><td>';
        // }
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color: grey; color:white; padding:3px;">'.$dateTime. 'h</td>';
        
    }
    for($j=8;$j<19;$j++){
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color:green; color:white; padding:10px;">'.$dateTime. 'h</td>'; // need nom + titre de resa 
    }
    for($e=19; $e<=24; $e++){
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color: grey; color:white; padding:3px;">'.$dateTime. 'h</td>';
        if($dateTime === 24){
            echo '</tr>';
        }
    }
    // if($dayInYear % 7 === 0)
    // echo '</td></table> ';
    }

    






?>

</main>
<?php
ob_end_flush();
?>