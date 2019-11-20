<?php

require_once('../inc/init.php');
if(!isAdmin() ){
    header("location:". URL. "connexion.php");
    exit();
}
$title ="Gestion des membres";
if(isset($_GET["up"]) && !empty($_GET["up"])){
    execRequete("UPDATE membre SET statut = 1 WHERE id_membre = :id_membre",array('id_membre' => $_GET['up']
 )); 
}
if(isset($_GET["down"]) && !empty($_GET["down"])){

 execRequete("UPDATE membre SET statut = 0 WHERE id_membre = :id_membre",array('id_membre' => $_GET['down']
));

}

require_once('../inc/header.php');
?>
<main>
    <div class="container">
    <h1 style="margin-top : 60px">GESTION DES MEMBRES</h1>
    <?php



$resultat = execRequete("SELECT id_membre,pseudo,nom,prenom,telephone,email,statut FROM membre");
if($resultat->rowCount() == 0){
    ?>
    <div>Il n'y a pas encore de membres enregistrés.</div>
    <?php
}
else{
    ?>
    <h2 style="text-align : center">Il y a <?= $resultat->rowCount()?> membre(s) dans la BDD.</h2>
    <table>
        <tr>
            <?php
                for($i=0; $i<$resultat->columnCount(); $i++){
                    $colonne = $resultat->getColumnMeta($i);
                    ?>
                    <th><?= $colonne["name"] ?></th>
                    <?php
                }
            ?>
            <th colspan="2">Modif Statut</th>
        </tr>
        <?php
        while($produit = $resultat->fetch() ){
            ?>
            <tr>
                <?php
                foreach($produit as $key => $value){
                   
                    ?>
                    <td><?= $value ?></td>
                    <?php
                }
                ?>
                <td><a href="?down=<?= $produit["id_membre"] ?>"><i class=" text-dark fas fa-minus"></i></a></td>

                <td><a href="?up=<?= $produit["id_membre"] ?>"><i class=" text-dark fas fa-plus"></i></a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
    </main>
    <?php
}


require_once('../inc/footer.php');