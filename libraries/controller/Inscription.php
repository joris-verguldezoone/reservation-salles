<?php

namespace Controller;

require_once($Http);
require_once($utils);

class Inscription // s'appel User
{
    public $login = "";
    public $password = "";
   
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
            if (($login_length >= 2) && ($password_length  >= 5) && ($confirm_password_length >= 4)) { // limite minimum de caractere

                if (($login_length <= 30) && ($password_length  <= 30) && ($confirm_password_length <= 30)) { // limite maximum de caractere

                    $modelInscription = new \Models\Inscription();
                    $return = $modelInscription->ifExist($login); // l'utilisateur existe-t-il ? 

                    if (!$return) {

                        if ($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                        {
                            $modelInscription->secure($login);
                            $modelInscription->secure($password);
                            $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                            $modelInscription->insert($login, $cryptedpass);

                            $Http = new \Http();
                            $Http->redirect('connexion.php'); // GG WP
                        } else {
                            $errorLog = "<p class='alert alert-danger' role='alert'>Confirmation du mot de passe incorrect</p>";
                        }
                    } else {
                        $errorLog = "<p class='alert alert-danger' role='alert'>Identifiant déjà utilisé</p>";
                    }
                } else {
                    $errorLog = "<p class='alert alert-danger' role='alert'>mdp et identifiant limités a 30 caractères</p>";
                }
            } else {
                $errorLog = "<p class='alert alert-danger' role='alert'>login, doit avoir 2 caracteres minimum, le mdp doit avoir 5 caracteres minimum</p>";
            }
        } else {
            $errorLog = "<p class='alert alert-danger' role='alert'>Champs non remplis</p>";
        }
        echo $errorLog;
    }


    

    
}
