<?php

namespace Controller;

ob_start();

require_once($utils);
require_once($Http);

class Reservation{

public $titre= "";
public $description= "";
public $debut= "";
public $fin= "";
public $id_utilisateur = "";

    public function createEvent($titre, $description, $debut, $fin, $id_utilisateur)
    {
        $this->titre = $_POST['titre'];
        $this->description = $_POST['description'];
        $this->debut = $_POST['debut'];
        $this->fin = $_POST['fin'];
        $this->id_utilisateur = $_SESSION['utilisateur']['id'];
        $errorLog = "";
        if(!empty($titre) && !empty($description) &&!empty($debut) &&!empty($fin))
        {
            $debutRes = date('N', strtotime($debut)); // on détermine les week-end
            $finRes = date('N', strtotime($fin));
        
            if($debutRes !== '6' && $debutRes !== '7')
            {
                if($finRes !== '6' && $finRes !== '7') 
                {
                    $debutRes = date('Y-m-d H:i:s', strtotime($debut)); // on adapte le format 
                    $finRes = date('Y-m-d H:i:s', strtotime($fin));

                    $titreLen = strlen($titre);
                    $descriptionLen = strlen($description);

                    if($titreLen > 2 AND $descriptionLen > 5)
                    {
                        if($titreLen < 16 AND $descriptionLen < 250)
                        {
                            $newEvent = new \Models\Reservation();
                            $titre = $newEvent->secure($titre);
                            $description = $newEvent->secure($description);
                            $debut = $newEvent->secure($debut);
                            $fin = $newEvent->secure($fin);
                            $id_utilisateur =  $newEvent->secure($id_utilisateur);

                            $newEvent->insert($titre, $description, $debut, $fin, $id_utilisateur); // GG WP
                            echo '<p class="alert alert-success" role="alert">Evenement créer avec succès<p>';
                        }
                        else
                        {
                            $errorLog = "<p class='alert alert-danger' role='alert'>titre a 15 caracteres maximum et la description 250</p>";
                        }
                        }
                    else
                    {
                        $errorLog = "<p class='alert alert-danger' role='alert'> le titre doit contenir 2 caracteres minimum et la description 5</p>";
                    }
                } 
                else 
                    {
                        $errorLog = "<p class='alert alert-danger' role='alert'>pas de réservation le week-end!</p>";
                    } 
            }
            else 
            {
                $errorLog = "<p class='alert alert-danger' role='alert'>pas de réservation le week-end!</p>";
            }
            }
        else
        {
            $errorLog = "<p class='alert alert-danger' role='alert'>Vous devez remplir les champs pour créer l'événement</p>";
        }
    echo $errorLog;
            
}
}
ob_end_flush();