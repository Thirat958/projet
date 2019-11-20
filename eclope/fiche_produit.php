<?php 
require_once('inc/init.php');

if(!empty($_GET["id_produit"])){
    $resultat = execRequete("SELECT * FROM produits WHERE id_produit = :id_produit",array("id_produit"=>$_GET["id_produit"]));
    if ($resultat->rowCount() == 1 ){
        $produit = $resultat-> fetch();
    }else{
        header("location:".URL);
        exit();
    }
        
}
else{
    header("location:".URL);
    exit();
}

$title = $produit["titre"];
require_once('inc/header.php');
?>
<main>
    <div class="container">
    <h1 style="margin-top : 60px"><?= $produit["titre"] ?></h1>   

    <div class="fiche">
    <div class="imgfiche">
    <img src="<?= URL."photo/".$produit["photo"] ?>" alt="<?=  $produit['titre'] ?>">
    </div>
    <div class="barredroite">
    <h3><?= $produit["titre"]?></h3>
    
    <p><strong>Marque :</strong> <?= ' '.$produit['marque']?></p>
    <p><strong>Prix :</strong> <?= $produit["prix"] ?>€</p>
    <p><strong>Stock :</strong> <?=$produit['stock']?></p>
    <p><strong>Référence :</strong> <?=$produit['ref']?></p>
    
</div>
<div style="margin-top : 20px" class="barre"></div>
<p class="descriptionp"><span style="font-weight : bold"> Description :</span> <?=$produit['description']?> </p>

    </div>
    <?php
        if ($produit['stock'] > 0){
            if($produit['stock'] > 10){
            ?>
            <p class="okgood">EN STOCK</p>
            <form  id="formajout" action="panier.php" method="post">
            
            <select id="ajout" name="quantite">
                <?php
                for( $i=1; $i<=$produit['stock'] && $i<=10; $i++){
                ?>
                <option><?=$i ?>
            </option>
            <?php
                }
                ?>
            </select>
            <input class="envoi" type="submit" name="ajout_panier" value="AJOUTER AU PANIER">
            </form>
            <?php
            }
            else {
                ?>
            <p class="wrong">Plus que <?= $produit['stock']?> en stock !</p>
            <form  id="formajout" action="panier.php" method="post">
            
            <select id="ajout" name="quantite">
                <?php
                for( $i=1; $i<=$produit['stock'] && $i<=10; $i++){
                ?>
                <option><?=$i ?>
            </option>
            <?php
                }
                ?>
            </select>
            <input class="envoi" type="submit" name="ajout_panier" value="AJOUTER AU PANIER">
            </form>

                <?php
            }
        }
        else {
            ?>
        <div class="redalert"><p>Produit en cours de réapprovisionnement</p></div>

<?php
        
        }
    ?>
    <h2 class="ficheh2">Ces produits pourraient vous intéresser ...</h2>
    <div class="showroompromo">
    <?php
    $resultat = execRequete("SELECT * FROM produits p JOIN categories c ON c.id_categorie = p.id_categorie ORDER BY RAND() LIMIT 0,3 ");
    while($produit = $resultat-> fetch() ){
        ?>
        <div class="produit">
                    <a href="<?= URL."fiche_produit.php?id_produit=". $produit["id_produit"] ?>">
                    <img src="<?= URL."photo/".$produit["photo"] ?>" alt="<?= $produit["titre"]?>" ></a>
                    <p><?= $produit["marque"]." | ".$produit["titrecateg"]." | ".$produit["prix"]."€" ?></p>
                 <a class="bouttonpromo" href="<?= URL."fiche_produit.php?id_produit=". $produit["id_produit"] ?>">VOIR</a>
    
    
            </div>
        
        <?php
    }
    ?>
    

    </div>

    </div> <!-- FIN CONTAINER -->
</main>
<?php 

require_once('inc/footer.php');