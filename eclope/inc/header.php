<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= URL . 'inc/css/style.css' ?>">
    <link rel="stylesheet" href="<?= URL . 'inc/css/boxshadow.css' ?>">
    <link rel="stylesheet" href="<?= URL . 'inc/css/formulaire.css' ?>">
    <link rel="stylesheet" href="<?= URL . 'inc/css/media.css' ?>">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?= URL .'inc/js/script.js'?>"></script>
    <title>E-Clope | <?= $title ?></title>


</head>

<body>


        <header>
            <nav>
    
        <div class="burger">
            <i class="fas fa-chevron-circle-down"></i>
        </div>
        <ul class="listenav">
            <li><a href="<?= URL."index.php"?>">ACCUEIL</a></li>
            <li class="deroulant"><a href="<?= URL."produits.php"?>">PRODUITS</a></li>
            
            <?php
            if (isAdmin()) {
                ?>
            <li><a href="<?= URL."admin/admin.php" ?>">ADMIN</a></li>
<?php
            }
             
                    if (isConnected() ) {
                    ?>
                    <li><a href="<?= URL."compte.php" ?>">PROFIL</a></li>
                    <li><a id="deconnexion" href="<?= URL."deconnexion.php" ?>">DECONNEXION</a></li>
                    
                    <?php }
                     else {
                        ?>
                    <li><a href="<?= URL."inscription.php" ?>">INSCRIPTION</a></li>
                    <li><a href="<?= URL."connexion.php" ?>">CONNEXION</a></li>
                     <?php }
                     
                    ?>
                    <li><a href="<?= URL."panier.php" ?>"><i class="fas fa-shopping-basket"></i></a></li>


        </ul>

        <ul class="listeburger">
        <li><a href="<?= URL."index.php"?>">ACCUEIL</a></li>
            <li><a href="<?= URL."produits.php"?>">PRODUITS</a></li>
            <?php
            if (isAdmin()) {
                ?>
            <li><a href="<?= URL."admin/admin.php" ?>">ADMIN</a></li>
<?php
            }
             
             
                    if (isConnected() ) {
                    ?>
                    <li><a href="<?= URL."compte.php" ?>">PROFIL</a></li>
                    <li><a id="deconnexion" href="<?= URL."deconnexion.php" ?>">DECONNEXION</a></li>
                    <?php }
                     else {
                        ?>
                    <li><a href="<?= URL."inscription.php" ?>">INSCRIPTION</a></li>
                    <li><a href="<?= URL."connexion.php" ?>">CONNEXION</a></li>
                     <?php }?>
                    <li><a href="<?= URL."panier.php" ?>">PANIER</a></li>
        </ul>
    </nav>
    </header>