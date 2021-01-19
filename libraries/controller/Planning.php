<?php

// require($InscriptionController);
// require($InscriptionModels);
// require($ReservationModels);
namespace Controller;


class Planning{
    
    public function planningView(){
    
        $DateTime = new \DateTime(''); // ajd
        $dayInYear = 0; // incrementation des jours
        $day = 86400; // durée en seconde ->seTimeStamp()
        
        
        //mettre sql tableau 
        
        $CompareCalendar = new \Models\Reservation();
        $arrayResa = $CompareCalendar->resaDisplay();
        // }
        // catch(Exception $e){

        // }
        $title = $CompareCalendar->getTitle();

        // recuperation du tableau 
        date_default_timezone_set('Europe/Paris'); // fuseau horaire

        while($dayInYear < 28 ){ // nombre de jours que je souhaite imprimer
            
            if($dayInYear % 7 === 0) // semaineDisplay
            {
                echo '<table>';
            }
            
            $DateTime->setTimestamp(1610582400+$day*$dayInYear); // c'est ici que je défini le temp
            echo '<th style="background-color:teal; padding:20px;"> '.$DateTime->format('l-d-m-Y') .'</th>'; // doit avoir la date actuelle
            
            $day = 86400; // jour en secondes
            $dayInYear++; 

            
            $dateTime = 0;
            for($i=0;$i<7;$i++){ 
                $dateTime = $dateTime + 1; // heures
                echo '<td style="background-color: #a79b86; color:white; padding:3px;">'.$dateTime. 'h</td>';
                
            }
            
            
            $action = "";
            $id = 0; 

            
            for($j=8;$j<19;$j++){ // heure reservable
                $dateTime = $dateTime + 1; // heures
                $hour = $j * 3600;
                $timeStamp = 1610496000+$day*$dayInYear + $hour; // heures++

                $color = "green";
                $timestampSTR = gmdate('Y-m-d H:i:s', $timeStamp);   
                $limitWeekend = date('N', strtotime($timestampSTR));
                
                $titre = ""; // reinitialisation
                $login = "";
                $id = "";
                

                if($limitWeekend !== '6' && $limitWeekend !== '7') // Week-end
                {
                    if(isset($arrayResa))
                    {
                        foreach($arrayResa AS $value) // Display reservation
                        {
                            $debut = $value[0];
                            $fin = $value[1];
                                    if($timeStamp>=$debut AND $timeStamp<$fin ) // heure de réservation
                                    {
                                        $titre = $value[2];
                                        $login = $value[3];
                                        $id = $value[4];
                                        $color = "#39badb";
                                        $action = 'reservation.php';
                                    }
                                }
                                echo '<td style="background-color:'.$color.'; color:white; padding:10px;"><form method="GET" action='.$action.'><input type="hidden" name="Evenement" id="hiddenId" value="'.$id.'"><button type="submit" >'.$dateTime.'h<br />'.$titre.' <br />'. $login.'</button></form></td>';
                    }
                }
                else{
                    $color ="#a79b86";
                    echo '<td style="background-color:'.$color.'; color:white; padding:10px;"><p href="reservation-form.php" style="background-color : grey; margin: 2vh; min-height:5vh; min-width:5vh; border-radius: 1em; display:flex;align-items:center; justify-content:center;">Week-End</p>';
                }
            }        
                            for($e=19; $e<=24; $e++){
                                $dateTime = $dateTime + 1; // heures
                                echo '<td style="background-color: #a79b86; color:white; padding:3px;">'.$dateTime. 'h</td>';
                                if($dateTime === 24)
                                {
                                    echo '</tr>';
                                }
                            }
            if($dayInYear % 7 === 0) // semaine
            {
                echo '</table>';
            }
                                    
        }
    }
    
}
?>