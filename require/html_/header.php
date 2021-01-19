<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $bootstrap; ?>">
    <link rel="stylesheet" href="<?php echo $headerCss; ?>">
    <link rel="stylesheet" href="<?php echo $pagesCss; ?>">
    <link rel="stylesheet" href="<?php echo $footerCss; ?>">
    <title><?php $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" style="font-weight:bold;" href="<?php echo $index;?>">La Cage D'Escalier</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ul_row">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $index; ?>">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $inscription; ?>">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $connexion; ?>">Connexion</a>
                    </li>
                    <?php
                    
                    if(isset($_SESSION['connected'])){
                        echo'
                        <li class="nav-item">
                            <a class="nav-link" href="'.$profil.'">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="'.$reservation.'">Reserver</a>
                        </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $planning; ?>">Planning</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header> 