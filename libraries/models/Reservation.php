<?php

namespace Models;

require_once($database);

class Reservation {

    public $titre = "";
    public $description = "";
    public $debut = "";
    public $fin = "";
    public $id_utilisateur = "";

    public function __construct()
        {
            $this->pdo = connect();
        }
        
        
        
        // if(($début>2022-12-12) && ($debut<)
        
    public function insert($titre, $description, $debut, $fin, $id_utilisateur){
        date_default_timezone_set('Europe/Paris'); // fuseau horaire
        $errorLog = "";
        $datetime1 = date_create($debut);
        $datetime2 = date_create($fin);
   
        $interval = date_diff($datetime1, $datetime2);
        $tsDebut = strtotime($debut);
        $tsFin = strtotime($fin);
        $tsDiff = ($tsFin - $tsDebut)/60; // min 
        if($interval->format('%a') == 0 ){ // ça compte en jours
            if($interval->format('%h') == 1 ){ 
                $reservation = new \Models\Reservation();
                $count = $reservation->ifExistDate($debut,$fin);
                if(!$count){
                    if($tsDiff <=60 ){ 
                        $sql = "INSERT INTO reservations (titre,description,debut,fin,id_utilisateur ) VALUES(:titre,:description,:debut,:fin,:id_utilisateur)";
                        $result = $this->pdo->prepare($sql);
                        $result->bindvalue(':titre',$titre, \PDO::PARAM_STR);
                        $result->bindvalue(':description',$description, \PDO::PARAM_STR);
                        $result->bindvalue(':debut',$debut, \PDO::PARAM_STR);
                        $result->bindvalue(':fin',$fin, \PDO::PARAM_STR);
                        $result->bindvalue(':id_utilisateur',$id_utilisateur, \PDO::PARAM_INT);

                        $result->execute();         
                    }
                    else{
                        $errorLog="<p class='alert alert-danger' role='alert'>pas de réservation dépassant 1 heure</p>";
                    }
                }
                else{
                    $errorLog = "<p class='alert alert-danger' role='alert'>Ce crénaux est déjà réservé</p>";   
                }
            }
            else{
                $errorLog="<p class='alert alert-danger' role='alert'>pas de réservation dépassant 1 heure</p>";
            }
        }
        else{
            $errorLog="<p class='alert alert-danger' role='alert'>pas de réservation dépassant 1 heure</p>";
        }
        echo $errorLog;
    }


    public function resaDisplay(){

        // $id = $_SESSION['utilisateur']['id'];


        $sql ="SELECT r.debut, r.fin, r.titre, u.login, r.id FROM reservations AS r LEFT JOIN utilisateurs AS u ON u.id = id_utilisateur ORDER BY r.debut";

        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i=0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC))
        {
       
           $dateTime = new \DateTime();
           
           $format = 'Y-m-d H:i:s';
           $dateTime = \DateTime::createFromFormat($format,$fetch['debut']);
           $tableau[$i][] = $dateTime->getTimestamp();

           $dateTime2 = new \DateTime();
           
           $format = 'Y-m-d H:i:s';
           $dateTime2 = \DateTime::createFromFormat($format,$fetch['fin']);
           $tableau[$i][] = $dateTime2->getTimestamp();

           $tableau[$i][] = $fetch['titre'];
           $tableau[$i][] = $fetch['login'];
           $tableau[$i][] = $fetch['id'];
        $i++;

        }

        return $tableau;
    }

    public function getTitle(){
        $sql = "SELECT titre FROM reservations ORDER BY id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i] = $fetch['titre'];
            $i++;
        }

        return $tableau;

        // $sql = "SELECT titre FROM reservations WHERE id_utilisateur = :SESSIONid AND id = :id";
        // $result = $this->pdo->prepare($sql);
        // $result = bindvalue(':id_utilisateur',$SESSIONid, \PDO::PARAM_INT);
        // $result = bindvalue(':id_utilisateur',$id, \PDO::PARAM_INT);
        // $result->execute();

        // return $result;
    }

    
    public function nomTitreDisplay(){
        $sql = "SELECT titre FROM reservations ORDER BY id";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        return $result;
    }
    public function eventLink($id){
        $sql = "SELECT u.login, r.titre, r.description, r.debut, r.fin FROM reservations AS r INNER JOIN utilisateurs AS u WHERE r.id = '$id' AND u.id = r.id_utilisateur";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':id', $id, \PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tableau[$i][] = $fetch['login'];
            $tableau[$i][] = $fetch['titre'];
            $tableau[$i][] = $fetch['description'];
            $tableau[$i][] = $fetch['debut'];
            $tableau[$i][] = $fetch['fin'];
            $i++;
            
            return $tableau;

        }

    }
    public function ifExistDate($debut, $fin){

        $sql = "SELECT debut, fin FROM reservations WHERE debut =:debut AND fin = :fin";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':debut', $debut, \PDO::PARAM_STR);
        $result->bindvalue(':fin', $fin, \PDO::PARAM_STR);

        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
}