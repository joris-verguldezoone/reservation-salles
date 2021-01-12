<?php

namespace Models;

require_once($database);
require('Model.php');

class Reservation{

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
          
    $sql = "INSERT INTO reservations (titre,description,debut,fin,id_utilisateur ) VALUES(:titre,:description,:debut,:fin,:id_utilisateur)";
    $result = $this->pdo->prepare($sql);
    $result->bindvalue(':titre',$titre, \PDO::PARAM_STR);
    $result->bindvalue(':description',$description, \PDO::PARAM_STR);
    $result->bindvalue(':debut',$debut, \PDO::PARAM_STR);
    $result->bindvalue(':fin',$fin, \PDO::PARAM_STR);
    $result->bindvalue(':id_utilisateur',$id_utilisateur, \PDO::PARAM_INT);
    
    $result->execute();

}
public function resaDisplay($debut,$fin,$login,$titre){

$id = $_SESSION['utilisateur']['id'];


$sql ="SELECT r.debut, r.fin, u.login, r.titre FROM reservations AS r LEFT JOIN utilisateurs AS u ON u.id=id_utilisateur";


}

} 