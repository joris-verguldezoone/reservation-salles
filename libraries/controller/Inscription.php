<?php

namespace Controller;

require_once($Http);
require_once($utils);
class Inscription // s'appel User
{
    // attributs

    protected $login = "";
    protected $password = "";

    // public function __construct(){

    // }
    public function register($login, $password, $confirm_password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];

        $confirm_password = $_POST['confirm_password'];
        $errorLog = null;
        if (!empty($login) && !empty($password) && !empty($confirm_password)) { // si les champs sont vides alors $errorLog

            $login_length = strlen($login);
            $password_length = strlen($password);
            $confirm_password_length = strlen($confirm_password);
            if (($login_length >= 2) && ($password_length  >= 5) && ($confirm_password_length >= 4)) {
                // si les champs n'ont pas assez de caractere alors $errorLog

                if (($login_length <= 30) && ($password_length  <= 30) && ($confirm_password_length <= 30)) {

                    $modelInscription = new \Models\Inscription();
                    $return = $modelInscription->ifExist($login);

                    if (!$return) {

                        if ($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                        {
                            $modelInscription->secure($login);
                            $modelInscription->secure($password);
                            $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                            $modelInscription->insert($login, $cryptedpass);

                            $Http = new \Http();
                            $Http->redirect('pages/connexion.php');
                        } else {
                            $errorLog = "Confirmation du mot de passe incorrect";
                        }
                    } else {
                        $errorLog = "Identifiant déjà utilisé";
                    }
                } else {
                    $errorLog = "mdp et identifiant limités a 30 caractères";
                }
            } else {
                $errorLog = "login, doit avoir 2 caracteres minimum, le mdp doit avoir 5 caracteres minimum";
            }
        } else {
            $errorLog = "Champs non remplis";
        }


        echo $errorLog;
    }


    public function connect($login, $password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $errorLog = null;

        if (!empty($login) && !empty($password)) { // il faut remplir les champs sinon $errorLog

            $modelConnection = new \Models\Inscription();

            $fetch = $modelConnection->ifDoesntExist($login);
            if ($fetch) {
                $passwordSql = $modelConnection->passwordVerifySql($login);


                if (password_verify($password, $passwordSql['password'])) {
                    $_SESSION['connected'] = true;
                    $utilisateur = $modelConnection->findAll($login);
                    $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION
                    var_dump($utilisateur);
                    var_dump($_SESSION); 
                    $Http = new \Http();
                    $Http->redirect('profil.php');
                } else {
                    $errorLog = "Mot de passe incorrect";
                }
            } else {
                $errorLog = "Identifiant incorrect";
            }
        } else {
            $errorLog = "Veuillez entrer des caracteres dans les champs";
        }
        echo $errorLog; // on aurait pu mettre un return mais flemme :-) pour un prochain projet
    }


    function profil($login, $password, $confirm_password)
    {
        
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $errorLog = null;

        if (!empty($login) && !empty($password) && !empty($confirm_password)) { // il faut entrer des modifications pour les appliquer 

            $login_lenght = strlen($login);
            $password_lenght = strlen($password);
            $confirm_password_length = strlen($confirm_password);

            if (($login_lenght >= 2) && ($password_lenght >= 5) <= 30) { // limitation du nbr de caractere minimum et maximum 
                if (($login_lenght <= 30) && ($password_lenght  <= 30)) { // si les champs n'ont pas assez de caractere alors $errorLog

                    $modelProfil = new  Inscription();
                    $fetch_utilisateur = $modelProfil->findAll($login); // faut que je mette le previous login issu des session 
                    var_dump($fetch_utilisateur);
                    $new_name = $modelProfil->ifExist($login);
                    echo $fetch_utilisateur['id'];
                    if(!$new_name){

                        if($_POST['password'] == $_POST['confirm_password']){
                            $cryptedpassword =  password_hash($password, PASSWORD_BCRYPT);
                            $modelProfil->update($login, $cryptedpassword, $fetch_utilisateur['id']);
                            echo "changement(s) effectué(s)";
                            var_dump($fetch_utilisateur);
                        }
                        else {
                                $errorLog = "Confirmation du mot de passe incorrect";
                            }
                    } else {
                        $errorLog = "identifiant déjà pris";
                    }
                } else {
                    $errorLog = "mdp et identifiant limités a 30 caractères";
                }
            } else {
                $errorLog = "2 caracteres minimum pour le login et 5 pour le mot de passe";
            }
        } else {
            $errorLog = "Veuillez entrer des caracteres dans les champs";
        }
        echo $errorLog;
    }
}
