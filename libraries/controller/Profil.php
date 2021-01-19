<?php
namespace Controller;

class Profil{

    public $login = "";
    public $password = ""; //facultatif

    public function profil($login, $password, $confirm_password)
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

                    $modelProfil = new \Models\Profil();
                    $fetch_utilisateur = $modelProfil->findAll($login); // je trouve mon id en dehors des session 
                    $new_name = $modelProfil->ifExist($login); // mon nouveau pseudo existe-t-il ? 
                
                    if (!$new_name) {

                        if ($_POST['password'] == $_POST['confirm_password']) {

                            $cryptedpassword =  password_hash($password, PASSWORD_BCRYPT);
                            $modelProfil->secure($login); 
                            $modelProfil->secure($cryptedpassword);
                            
                            
                            $modelProfil->update($login, $cryptedpassword, $fetch_utilisateur['id']); // GG WP
                            echo "changement(s) effectué(s)";
                        } 
                        else {
                            $errorLog = "<p class='alert alert-danger' role='alert'>Confirmation du mot de passe incorrect</p>";
                        }
                    } 
                    else {
                        $errorLog = "<p class='alert alert-danger' role='alert'>identifiant déjà pris</p>";
                    }
                } 
                else {
                    $errorLog = "<p class='alert alert-danger' role='alert'>mdp et identifiant limités a 30 caractères</p>";
                }
            } 
            else {
                $errorLog = "<p class='alert alert-danger' role='alert'>2 caracteres minimum pour le login et 5 pour le mot de passe</p>";
            }
        }
         else {
            $errorLog = "<p class='alert alert-danger' role='alert'>Veuillez entrer des caracteres dans les champs</p>";
        }
    echo $errorLog;
    }
}