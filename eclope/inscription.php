<?php
require_once('inc/init.php');

$title = "Inscription";


if (!empty($_POST)){
extract($_POST); // génére des variables à partir des index

execRequete("INSERT INTO membre VALUES (NULL,:pseudo,:prenom,:nom,:email,:mdp,:telephone,:ville,:cp,:adresse,0,NOW())",array(
    'pseudo'=>$pseudo,
    'prenom' => $prenom,
    'nom' => $nom,
    'email' => $email,
    'mdp' => sha1($mdp  . SALT ), 
    'telephone' => $telephone,
    ':ville'=>$ville,
    ':cp'=>$cp,
    ':adresse'=>$adresse
    
));
$lastid =  $pdo->lastInsertId();
$resultat = execRequete("SELECT * FROM membre WHERE id_membre = :id_membre",array( 'id_membre' => $lastid));
$membre = $resultat->fetch();
unset($membre['mdp']);
$_SESSION['membre'] = $membre;
header('location:' . URL );
exit(); 
}
require_once('inc/header.php');


?>
<main >
<div class="container">
    <div class="inscription">

    <div class="textinscription">
        <h2>Pourquoi s'inscrire chez nous ?</h2>
        <div class="inscriptionpourquoi">

        <h3>Promotions du moment</h3>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nisi, ducimus magnam harum ex neque voluptatem minus quisquam provident temporibus?</p>
        <img src="img/notif.png" alt="">

        </div>
        <div class="barre"></div>

        <div class="inscriptionpourquoi">

        <h3>Promotions du moment</h3>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nisi, ducimus magnam harum ex neque voluptatem minus quisquam provident temporibus?</p>
        <img src="img/notif.png" alt="">

        </div>
        <div class="barre"></div>
        <div class="inscriptionpourquoi">

        <h3>Promotions du moment</h3>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere nisi, ducimus magnam harum ex neque voluptatem minus quisquam provident temporibus?</p>
        <img src="img/notif.png" alt="">

        </div>
    </div>
<form class="forminscription" method="post">
                <h2>Inscription</h2>
                <div class="row">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>">
                </div>

                <div class="row">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>"> 
                </div>

                <div class="row">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?= $_POST['nom'] ?? '' ?>">  
                </div>

                <div class="row">
                <label for="email">Votre Email :</label>
                <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
                </div>
                <div class="row">
                <label for="mdp">Votre mot de passe :</label>
                <input name="mdp" type="password">
                </div>

                <div class="row">
                <label for="telephone">Votre numéro de téléphone :</label>
                <input name="telephone" type="text" value="<?= $_POST['telephone'] ?? '' ?>">
                </div>

                <div class="row">
                <label for="ville">Votre ville :</label>
                <input name="ville" type="text" value="<?= $_POST['ville'] ?? '' ?>">
                </div>

                <div class="row">
                <label for="cp">Votre code postal :</label>
                <input name="cp" type="text" value="<?= $_POST['cp'] ?? '' ?>">
                </div>

                <div class="row">
                <label for="adresse">Votre Adresse :</label>
                <input type="text" name="adresse" id="adresse" value="<?= $_POST['adresse'] ?? '' ?>">      
                </div>

                <input type="submit" class="envoi einscription" value="S'INSCRIRE">
                </form>


                </div>
                </div>
</main>
<?php 
require_once('inc/footer.php');