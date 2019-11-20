<?php

require_once("../inc/init.php");
$title = "Gestion des produits";
if(!isAdmin() ){
    header("location:". URL. "connexion.php");
    exit();
}
if(isset($_GET["up"]) && !empty($_GET["up"])){
    execRequete("UPDATE produits SET stock = stock + 1 WHERE id_produit = :id_produit",array('id_produit' => $_GET['up']
 )); 
}
if(isset($_GET["down"]) && !empty($_GET["down"])){

 execRequete("UPDATE produits SET stock = stock - 1 WHERE id_produit = :id_produit",array('id_produit' => $_GET['down']
));

}
if (!empty($_POST)){
extract($_POST); //


execRequete("INSERT INTO categorie VALUES (NULL,:titre,:motscles)", array(
    "titre" => $titre,
    "motscles" => $motscles,

));
}
if(isset($_GET["supp"]) && !empty($_GET["supp"])){
    $resultat = $pdo->prepare("DELETE FROM produits WHERE id_produit = :id_produit");
    $resultat->execute(array(
        "id_produit" => $_GET["supp"]
    ));
    header("location:gestion_produits.php"); // redirection sur soi-même
}


require_once("../inc/header.php");

?>
<main>
    <div class="container">
<h1 style="margin-top : 60px">Gestion des Produits</h1>
<?php

    $resultat = execRequete("SELECT * FROM produits");
    if($resultat->rowCount() == 0){
        ?>
        <div class="alert alert-warning">Il n'y a pas encore de catégories enregistrés.</div>
        <?php
    }
    else{
        ?>
        <p>Il y a <?= $resultat->rowCount()?> annonces dans la BDD.</p>
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
                <th style="text-align : center" colspan="3">actions</th>
            </tr>
            <?php
            while($produit = $resultat->fetch() ){
                ?>
                <tr>
                    <?php
                    
                    foreach($produit as $key => $value){
                        if($key == "photo"){
                            $value = '<img src="'.URL.'photo/'.$value.'"alt="'.$produit["titre"].'" class="img-fluid">';
                        }
                        if($key =="description"){
                            $value = substr($value, 0,90)." ...";
                        }
                        ?>
                        <td><?= $value ?></td>
                        <?php
                    }
                    ?>
                    <td><a href="?down=<?= $produit["id_produit"] ?>"><i class=" text-dark fas fa-minus"></i></a></td>

                <td><a href="?up=<?= $produit["id_produit"] ?>"><i class=" text-dark fas fa-plus"></i></a></td>

                    <td><a href="?supp=<?= $produit["id_produit"] ?>" class=" confirm"><i class=" text-dark fas fa-trash-alt"></i></a></td>
                    

                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }?>
</div> <!-- FIN CONTAINER -->
</main>
<?php




require_once("../inc/footer.php");
?>



