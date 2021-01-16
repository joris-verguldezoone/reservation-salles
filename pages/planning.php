<?php
ob_start();
//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/planning.css";
//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation-form.php";
$reservationForm = "reservation-form.php";
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
// a faire sous forme de class



$DateTime = new DateTime(''); // ajd
$dayInYear = 0; // incrementation des jours
$day = 86400; // durée en seconde ->seTimeStamp()


//mettre sql tableau 

$CompareCalendar = new \Models\Reservation();
$arrayResa = $CompareCalendar->resaDisplay();
$title = $CompareCalendar->getTitle();

// recuperation du tableau 
date_default_timezone_set('Europe/Paris'); // fuseau horaire

while($dayInYear < 28 ){
    
    if($dayInYear % 7 === 0)
    {
        echo '<table>';
    }
    
    $DateTime->setTimestamp(1610582400+$day*$dayInYear); //                                                 c'est ici que je défini le temp
    echo '<th style="background-color:teal; padding:20px;"> '.$DateTime->format('l-9+d-m-Y') .'</th>'; // doit avoir la date actuelle
    // echo '<th style="background-color:teal; padding:20px;"> '. .'</th>'; // doit avoir la date actuelle
    
    $day = 86400;
    $dayInYear++; 

    
    $dateTime = 0;
    for($i=0;$i<7;$i++){ 
        $dateTime = $dateTime + 1; // heures
        echo '<td style="background-color: grey; color:white; padding:3px;">'.$dateTime. 'h</td>';
        
    }
    
    $titre = "";
    $login = "";
    $path = "";
    $id = 0; 

    
    for($j=8;$j<19;$j++){
        $dateTime = $dateTime + 1; // heures
        $hour = $j * 3600;
        $timeStamp = 1610496000+$day*$dayInYear + $hour;

        $color = "green";

        // $timestampSTR = gmdate('Y-m-d H:i:s', $timeStamp);                          //  cetait pour limiter les resa week n mais c pas au point
        // $limitWeekend = date('N', strtotime($timestampSTR));
        

        //     if($limitWeekend !== '6'){
        //         $color = "grey";
        //         if($limitWeekend !== '7'){
        //             $color = "grey";
        
        
        foreach($arrayResa AS $value) 
        {
            $debut = $value[0];
            $fin = $value[1];
                    if($timeStamp>=$debut AND $timeStamp<$fin ){
                        $titre = $value[2];
                        $login = $value[3];
                        $id = $value[4];
                        $color = "red";
                        $path = 'reservation.php';

                    }
               
                }
                echo '<td style="background-color:'.$color.'; color:white; padding:10px;"><form method="GET" action='.$path.'><input type="hidden" name="Evenement" id="hiddenId" value="'.$id.'"><button type="submit" >'.$dateTime.'h<br />'.$titre.' <br />'. $login.'</button></form></td>';
                $titre = "";
                $login = "";
                $id = "";
                
                
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
                //     }
                    
                // }
    }

if($dayInYear % 7 === 0)
{
    echo '<table>';
}
}

    






?>

</main>
<?php
//FOOTER
$img_signature = 'images/netero.png';
require('../require/html_/footer.php');
ob_end_flush();
?>