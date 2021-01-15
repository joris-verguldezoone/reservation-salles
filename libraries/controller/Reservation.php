<?php

namespace Controller;
ob_start();
require_once($utils);
require_once($Http);
class Reservation{

    //table ===	id	titre	description	debut	fin	id_utilisateur
// public function table($col, $row){

//     $date; 
//     $DateTime = new DateTime();

//     createFromFormat ( string $format , string $datetime , DateTimeZone|null $timezone = null ) : DateTime|false

public $titre= "";
public $description= "";
public $debut= "";
public $fin= "";
public $id_utilisateur = "";

    public function createEvent($titre, $description, $debut, $fin, $id_utilisateur){
        $this->titre = $_POST['titre'];
        $this->description = $_POST['description'];
        $this->debut = $_POST['debut'];
        $this->fin = $_POST['fin'];
        $this->id_utilisateur = $_SESSION['utilisateur']['id'];
        $errorLog = "";
        if(!empty($titre) && !empty($description) &&!empty($debut) &&!empty($fin)){

            $debutRes = date('N', strtotime($debut));
            $finRes = date('N', strtotime($fin));
        
            if($debutRes !== '6' && $debutRes !== '7')
            {
                if($finRes !== '6' && $finRes !== '7') {


                    $debutRes = date('Y-m-d H:i:s', strtotime($debut));
                    $finRes = date('Y-m-d H:i:s', strtotime($fin));

                    $titreLen = strlen($titre);
                    $descriptionLen = strlen($description);

                        if($titreLen > 2 AND $descriptionLen > 5)
                        {
                            $newEvent = new \Models\Reservation();
                            $newEvent->insert($titre, $description, $debut, $fin, $id_utilisateur);
                        }
                        else{
                            $errorLog = " le titre doit contenir 2 caracteres minimum et la description 5";
                        }
             
                    } 
                    else 
                    {
                        die("<p style='color: white; padding-bottom: 2em';>"."* Les réservations sont uniquement du Lundi au Vendredi et sur un jour seulement"."</p>");
                    } 
                }
                else 
                {
                    die("<p style='color: white; padding-bottom: 2em';>"."* Les réservations sont sur un jour seulement"."</p>");
                }
            }
        else{
            $errorLog = "Vous devez remplir les champs pour créer l'événement";
        }
        echo $errorLog;
            
}
    





    //generer le tableau 
    // genererles disponibilité 
    // contrer les fin antérieur au début 


}
ob_end_flush();