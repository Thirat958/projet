<?php

require_once("../inc/init.php");
$title = "Gestion des catégories";
if(!isAdmin() ){
    header("location:". URL. "connexion.php");
    exit();
}

if (!empty($_POST)){
extract($_POST); // génére des variables à partir des index


execRequete("INSERT INTO categories VALUES (NULL,:titrecateg)", array(
    "titrecateg" => $titrecateg,
));
}
if(isset($_GET["supp"]) && !empty($_GET["supp"])){
    $resultat = $pdo->prepare("DELETE FROM categories WHERE id_categorie = :id_categorie");
    $resultat->execute(array(
        "id_categorie" => $_GET["supp"]
    ));
    header("location:gestion_categories.php"); // redirection sur soi-même
}


require_once("../inc/header.php");

?>
<main>
    <div class="container">
    <h1 style="margin-top : 60px">Gestion des catégories</h1>

<?php



    $resultat = execRequete("SELECT id_categorie,titrecateg FROM categories");
    if($resultat->rowCount() == 0){
        ?>
        <div class="redalert">Il n'y a pas encore de catégories enregistrés.</div>
        <?php
    }
    else{
        ?>
        <p class="mt-2">Il y a <?= $resultat->rowCount()?> catégorie(s) dans la BDD.</p>
        <table  >
            <tr>
                <?php
                    for($i=0; $i<$resultat->columnCount(); $i++){
                        $colonne = $resultat->getColumnMeta($i);
                        ?>
                        <th><?= $colonne["name"] ?></th>
                        <?php
                    }
                ?>
                <th colspan="1">Supprimer</th>
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
                        ?>
                        <td><?= $value ?></td>
                        <?php
                    }
                    ?>
                    <td><a href="?supp=<?= $produit["id_categorie"] ?>" class=" confirm"><i class=" text-dark fas fa-trash-alt"></i></a></td>
                    

                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }?>
            <form action="" method="post">
        

        <label for="titrecateg">Titre catégorie</label>
        <input type="text" id="titrecateg" name="titrecateg"  value="">
        
    <input type="submit" class="envoi" value="Enregistrer">

</form>
</div>
</main>
<?php




require_once("../inc/footer.php");
?>



