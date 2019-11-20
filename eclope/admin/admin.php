<?php

require_once('../inc/init.php');

if(!isAdmin() ){
    header("location:". URL. "connexion.php");
    exit();
}

$title = "Page Administrateur";
require_once('../inc/header.php');
?>
<main>
    <div class="container">
    <h1 style="margin-top : 60px">PAGE ADMIN</h1>
    <div class="articleadmin">
        <div class="liensadmin">
        <a href="<?= URL.'admin/ajout_produits.php'?>"><img src="../img/ajout.png" alt=""></a> 
        <a href="<?= URL.'admin/ajout_produits.php'?>">AJOUTER DES PRODUITS</a>
        </div>
        <div class="liensadmin">
        <a href="<?= URL.'admin/gestion_produits.php'?>"><img src="../img/stock.png" alt=""></a> 
        <a href="<?= URL.'admin/gestion_produits.php'?>">GESTION PRODUITS/STOCK</a>

        </div>
        <div class="liensadmin">
        <a href="<?= URL.'admin/gestion_membres.php'?>"><img src="../img/membres.jpg" alt=""></a> 
        <a href="<?= URL.'admin/gestion_membres.php'?>">GESTION DES MEMBRES</a>

        </div>
        <div class="liensadmin">
        <a href="<?= URL.'admin/gestion_categories.php'?>"><img src="../img/categ.png" alt=""></a> 
        <a href="<?= URL.'admin/gestion_categories.php'?>">GESTION DES CATEGORIES</a>

        </div>

        </div>


    </div> <!-- FIN CONTAINER -->
</main>

<?php 

require_once('../inc/footer.php');