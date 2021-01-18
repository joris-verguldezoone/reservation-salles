<?php

namespace Models;

require_once($database);
require_once($utils);
// require_once($utils);
// require('libraries/controller/Inscription.php');


abstract class Model
{
    protected $pdo; //faux
    protected $login;
    protected $password;

  

    public function __construct()
    {
        $this->pdo = connect();
    }

    // public static function redirect($path)
    // {
    //     header("Location: $path");
    //     exit();
    // } http

    public function secure($var)
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function ifExist($login) // register->
    {
        // $login = $this->login;                                                                           revoir
        $sql = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
  
    public function passwordVerifySql($login) 
    {
        $sql = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function findAll($login)
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
}
