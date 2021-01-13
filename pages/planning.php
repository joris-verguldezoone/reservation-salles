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
require_once('../libraries/models/Reservation.php');
?>
<main>

<?php
// a faire sous forme de class



$DateTime = new DateTime(); // ajd
$dayInYear = 0; // incrementation des jours
$day = 86400; // durée en seconde ->seTimeStamp()


//mettre sql tableau 

$CompareCalendar = new \Models\Reservation();
$arrayResa = $CompareCalendar->resaDisplay();
$title = $CompareCalendar->getTitle();
var_dump($title);
foreach ($title as $key => $value) {
    echo $value. 'filsdep';
}
// recuperation du tableau 
date_default_timezone_set('Europe/Paris'); // fuseau horaire

while($dayInYear < 364 ){
    
    if($dayInYear % 7 === 0)
    {
        echo '<table> tableau créer';
    }

    $DateTime->setTimestamp(1610582400+$day*$dayInYear);
    echo '<th style="background-color:teal; padding:20px;"> '.$DateTime->format('d-m-Y') .'</th>'; // doit avoir la date actuelle
    // echo '<th style="background-color:teal; padding:20px;"> '. .'</th>'; // doit avoir la date actuelle
    
    $day = 86400;
    $dayInYear++; 
    
    $dateTime = 0;
    for($i=0;$i<7;$i++){ 
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color: grey; color:white; padding:3px;">'.$dateTime. 'h</td>';
        
    }

    for($j=8;$j<19;$j++){
        $dateTime = $dateTime + 1; // heures
        $hour = $j * 3600;
        $timeStamp = 1610582400+$day*$dayInYear + $hour;
        
        $color = "green";
        foreach($arrayResa AS $value) 
        {
            $debut = $value[0];
            $fin = $value[1];

            if($timeStamp>=$debut AND $timeStamp<$fin ){
                $color = "red";

            }
            
            
        } 
        echo '<td style="background-color:'.$color.'; color:white; padding:10px;">'.$dateTime. 'h</td>';
        
         
        // $datetime1 = date_create($debut);
        // $datetime2 = date_create($fin);
   
        // $interval = date_diff($datetime1, $datetime2);
        // echo $interval->format('%R%a'); // je suis un bg 
    
        // if($interval->format('%R%a')>0){ // ça compte en jours
        // if($interval->format('%R%a')<=5){ // pas de resa supérieur a 5 jours


    }

    for($e=19; $e<=24; $e++){
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color: grey; color:white; padding:3px;">'.$dateTime. 'h</td>';
        if($dateTime === 24){
            echo '</tr>';
        }
    }
  
}

    






?>

</main>
<?php
ob_end_flush();
?>