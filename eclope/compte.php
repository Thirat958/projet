<?php

require_once('inc/init.php');
$title = $_SESSION['membre']['pseudo'];
if(!isConnected() ){
    header("location:". URL. "connexion.php");
    exit();
}
if( !empty($_POST["modifcoordo"]) ){
    execRequete("UPDATE membre 
    SET nom = :nom,
        prenom = :prenom,
        pseudo = :pseudo,
        email = :email,
        telephone = :telephone,
        adresse = :adresse,
        cp = :cp,
        ville = :ville

    WHERE id_membre = :id_membre",array(
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'email' => $_POST['email'],
        'telephone' => $_POST['telephone'],
        'adresse' => $_POST['adresse'],
        'cp' => $_POST['cp'],
        'ville' => $_POST['ville'],
        'id_membre' => $_SESSION['membre']['id_membre']
    ));
    // je mets à jour la session
    $_SESSION['membre']['prenom'] = $_POST['prenom'];
    $_SESSION['membre']['nom'] = $_POST['nom'];
    $_SESSION['membre']['pseudo'] = $_POST['pseudo'];
    $_SESSION['membre']['email'] = $_POST['email'];
    $_SESSION['membre']['telephone'] = $_POST['telephone'];
    $_SESSION['membre']['adresse'] = $_POST['adresse'];
    $_SESSION['membre']['cp'] = $_POST['cp'];
    $_SESSION['membre']['ville'] = $_POST['ville'];


   
}
else
{
$contenu = '';
}


require_once('inc/header.php');
?>
<main>
    <div class="container">
    <h1 style="margin-top : 60px">Mon profil | <?= $_SESSION['membre']['pseudo'] ?></h1>
        <form action="" method="post">

        <div class="coordonnees">

            <div class="sectioncoordonnees">
            <div class="row">
            <label for="nom">Nom :</label>
            <input name="nom" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["nom"] ?>">
            </div>
            <div class="row">            
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" class="modif" disabled value="<?= $_SESSION["membre"]["prenom"] ?>">
            </div>
            <div class="row">
            <label for="pseudo">Pseudo :</label>
            <input name="pseudo" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["pseudo"] ?>">
            </div>
            <div class="row">
            <label for="email">E-mail :</label>
            <input name="email" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["email"] ?>">
            </div>
            
            </div>

            <div class="sectioncoordonnees">
            <div class="row">
            <label for="telephone">Téléphone :</label>
            <input name="telephone" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["telephone"] ?>">
            </div>
            <div class="row">
            <label for="adresse">Adresse :</label>
            <input name="adresse" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["adresse"] ?>">
            </div>
            <div class="row">
            <label for="cp">Code Postal :</label>
            <input name="cp" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["cp"] ?>">
            </div>
            <div class="row">
            <label for="ville">Ville :</label>
            <input name="ville" type="text" class="modif" disabled value="<?= $_SESSION["membre"]["ville"] ?>">
            </div>
            </div>
            
        </div>
        <div class="bouttonsprofil">
        <input id="modif" type="button"  value="MODIFIER">
        <input type="submit" name="modifcoordo" value="ENREGISTRER" class="modifcoordo">
        </div>
    </form>






</div>
</main>




<?php 

require_once('inc/footer.php');