<?php
require_once('inc/init.php');

$title = "Connexion";
$contenu ="";
if( !empty($_POST) ){


    if( !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        // controle des indentifiants
        $resultat = execRequete("SELECT * FROM membre WHERE pseudo=:pseudo AND mdp=:mdp",array(
            'pseudo' => $_POST['pseudo'],
            'mdp' => sha1($_POST['mdp'] . SALT )
        ));
        if( $resultat->rowCount() == 1 ){
            $membre = $resultat->fetch();
            unset($membre['mdp']);
            $_SESSION['membre'] = $membre;
            header('location:'.URL);
            exit();
        }else{
            $contenu = '<p class="redalert">Erreur sur les identifiants ou utilisateur introuvable.</p>';
        }

    }
}
        else {
            $contenu = "";
        }
require_once('inc/header.php'); ?>
<main class="mainconnexion">
    <div class="container">
<form action="" method="post">
<h1 style="margin-top : 60px">Connectez-vous</h1>

        <?= $contenu ?>
        <label for="pseudo">Pseudo :</label>
        <input type="pseudo" id="emali" name="pseudo">
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp">
    <input type="submit" class="Connexion" >
    </form>
    </div>
</main>
<?php
require_once('inc/footer.php');