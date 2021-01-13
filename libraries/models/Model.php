<?php

namespace Models;

require_once($database);
require_once($utils);
// require_once($utils);
// require('libraries/controller/Inscription.php');
// remplacer my_sqli par pdo  
// trier les fonction par rapport au classes
// insert pdo 
// recover pdo

abstract class Model
{
    protected $pdo; //faux
    protected $login;
    protected $password;

    //yes

    // function userpdo_connect($login,$password){

    //     $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');

    //     $this->login = $login;
    //     $this->password = $password;

    //     $sql = "SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login = ?"; // on vérifie si l'utilisateur est bien inscrit 
    //     $count = $bdd->prepare($sql);
    //     $count->execute(array($login));  // on execute la requete en remplaçant ? par $login
    //     $fetch = $count->fetch(PDO::FETCH_ASSOC);

    //     var_dump($fetch);
    //     //------------deuxieme requete

    //     $sql2 ="SELECT * FROM utilisateurs WHERE login = ?";
    //     $verif = $bdd->prepare($sql2);
    //     $verif->execute(array($login));
    //     $utilisateur = $verif->fetch(PDO::FETCH_OBJ);

    //     var_dump($utilisateur);

    //     if(!$fetch['nbr'] == 0){
    //         echo'okokokoko';

    //         if(password_verify($password, $utilisateur->password)){

    //             $this->id = $utilisateur->id;
    //             $this->email = $utilisateur->email;       // on maintient le flux de donnée a la connexion 
    //             $this->firstname = $utilisateur->firstname;
    //             $this->lastname = $utilisateur->lastname;
    //             echo 'yeah baby';
    //             return $utilisateur;
    //         }
    //     }
    // }
    // public function userpdo_disconnect(){ // si ça fonctionne, -> undefined index utilisateur 
    //     $this->login = null;    
    //     $this->password = null;    
    //     $this->email = null;    
    //     $this->firstname = null;    // on aurait pu utiliser un foreach keys values
    //     $this->lastname = null; 
    // }
    // public function userpdo_delete(){
    //     $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');

    //     $login = $this->login;

    //     $delete = "DELETE FROM utilisateurs WHERE login =:login ";
    //     $query = $bdd->prepare($delete);
    //     $query->bindvalue(':login',$login,PDO::PARAM_STR);
    //     $query->execute();
    //     echo'deleted';
    // }
    // public function userpdo_update($login, $password, $email, $firstname, $lastname){

    //     $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
    //     $previousLogin = $this->login;

    //     $login = trim($login);
    //     $password = trim($password);
    //     $email = trim($email);
    //     $firstname = trim($firstname);
    //     $lastname = trim($lastname); // on enleve les espace, les \n -> string et caractere non affichable 

    //     $update = "UPDATE utilisateurs SET  login = '$login', password = '$password',
    //     email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '$previousLogin'";
    //     $query= $bdd->prepare($update);

    //     $query->bindvalue(':login', $login,PDO::PARAM_STR);
    //     $query->bindvalue(':password', $password, PDO::PARAM_STR);
    //     $query->bindvalue(':email', $email, PDO::PARAM_STR);
    //     $query->bindvalue(':firstname', $firstname, PDO::PARAM_STR);
    //     $query->bindvalue(':lastname',$lastname,PDO::PARAM_STR);

    //     $query->execute();
    //     echo'dadadadadadaupdatedadadadadada';

    // }
    // public function userpdo_isConnected(){
    //     $login = $this->login;
    //     if($login){
    //     echo 'you are connected to the matrix';
    //     return true;
    //     }
    //yes

    // $sql = login = ? ou login:login
    // $result = $this->pdo->prepare($sql);
    // $result = execute(array($login));

    // $fethResult = $result->fetch(PDO::FETCH_ASSOC); 


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
        var_dump($fetch);
        return $fetch;
    }
    public function ifDoesntExist($login) // connect->
    {
        $sql = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        if ($fetch) {
            return true;
        } else {
            echo "Ce compte n'existe pas";
            return false;
        }
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





    // $query = mysqli_query($this->pdo, );
    // $count = mysqli_num_rows($query);
    public function insert($login, $cryptedpass)
    {
        $sql = "INSERT INTO utilisateurs (login, password) VALUES (:login, :password)";  // c pas comme ça qu'on fait
        $result = $this->pdo->prepare($sql);

        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->bindvalue(':password', $cryptedpass, \PDO::PARAM_STR);

        $result->execute();
        
    }


  
    // //--------------------------------------------------------------------PROFIL-----------------------------------------------------------------------------//
//utilisation de findAll
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
