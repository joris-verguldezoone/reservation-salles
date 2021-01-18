<?php

namespace Models {

    require_once("Model.php");

    class Profil extends Model
    {
        public function update($login,$password,$id){

            $sql = "UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password',$password , \PDO::PARAM_STR);
            $result->bindvalue(':id',$_SESSION['utilisateur']['id'], \PDO::PARAM_INT);
            $result->execute();
            $fetch = $result->fetch(\PDO::FETCH_ASSOC);
    
            return $fetch;
        }
        
    }
}