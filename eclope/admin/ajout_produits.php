<?php

require_once('../inc/init.php');
if(!isAdmin() ){
    header("location:". URL. "connexion.php");
    exit();
}
$contenu = "";
$title = "Ajout de produits";
if (!empty($_POST)){
    $errors = array();
    // controle des champs vides
    $nb_champs_vides = 0;
    foreach($_POST as $value){
        if(trim($value) =="") $nb_champs_vides++;
    }
    if($nb_champs_vides > 0){// il me manque au moins 1 champs
        $errors[]="Il manque $nb_champs_vides information(s).";
    }

    if(!empty($errors)){
        $contenu = '<h2 class="redalert">'.implode("<br>",$errors).'</h2>';
    }
    else {
    $photo_bdd = $_POST['photo'] ?? '';
    
    if( !empty($_FILES['photo']['name']) ){
        $photo_bdd =  $_FILES['photo']['name'];
        $chemin =  '../photo/' . $photo_bdd;
        move_uploaded_file( $_FILES['photo']['tmp_name'], $chemin );
    }
    $_POST['photo'] = $photo_bdd;

    execRequete("INSERT INTO produits VALUES (NULL,:id_categorie,:titre,:photo,:prix,:description,:marque,:ref,:stock)",$_POST);

    $lastid =  $pdo->lastInsertId();
    $resultat = execRequete("SELECT * FROM produits WHERE id_produit = :id_produit",array( 'id_produit' => $lastid));
    $annonce = $resultat->fetch();

    $contenu = "<h2 class='greenalert' >Produit bien ajouté</h2>";
    }

}
require_once('../inc/header.php');
?>
<main>
    <div class="container">
        <h1 style="margin-top : 60px">AJOUT PRODUIT</h1>
    <?= $contenu ?>
        <form enctype="multipart/form-data" method="post">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre">

            <label for="photo">Photo :</label>
            <input type="file" name="photo" id="photo">

            <label for="categorie">Catégorie :</label>
            <select class="form-control" name="id_categorie" id="id_categorie">

<?php
$req = $pdo->query("SELECT id_categorie,titrecateg FROM categories");
while ($row = $req->fetch()) {

?>

<option value="<?= $row["id_categorie"]?>"><?=$row['titrecateg']?></option>
<?php
}
?>

</select>
            <label for="prix">Prix :</label>
            <input type="number" step=".01" name="prix" id="prix">

            <label for="description">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <label for="marque">Marque :</label>
            <input type="text" name="marque" id="marque">

            <label for="ref">Référence :</label>
            <input type="number" name="ref" id="ref">

            <label for="stock">Stock :</label>
            <input type="number" name="stock" id="stock">


            <input class="envoi" type="submit" value="AJOUT">
        </form>



    </div>
</main>

<?php 

require_once('../inc/footer.php');