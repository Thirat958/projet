<?php

require_once('inc/init.php');

$title = "Accueil";



require_once('inc/header.php');


if(isset($_SESSION["attente"])){
    echo $_SESSION["attente"];
    unset($_SESSION["attente"]);
}

?>
    <div class="cover">
        <div class="filtre">
            <div class="textcover">
                <img src="img/logo.jpg" alt="Logo">
            </div>
        </div>
        </div>
    <main>
        <div class="containerindex">

            <div class="presentation">
                <div class="textpresentation">
                    <h1>Tout pour votre cigarette électronique</h1>
                    <p>Bonjour et bienvenue sur le site de E-clope store !</p>
                    <p>Situé dans le Val d'Oise au centre commercial Art de Vivre, vous trouverez chez nous une large gamme de produits diverses et variées.</p>
                    <p>Grace à notre service livraison, plus de la peine de vous déplacer ! </p>
                    <p>À bientôt chez nous.</p>
                </div>
                <div class="imgpresentation">
                </div>
            </div>
        </div> <!-- FIN CONTAINER -->
        <div class="bandeaupresentation">
            <div class="filtre filtrepresentation">
                <div class="carre">
                    <div class="imgcarre"><img src="img/panache.jpg" alt=""></div>
                    <h3>Du choix</h3>
                    <p>
                        Une gamme complète et variée, en boutique ou en ligne.
                    </p>
                </div>
                <div class="carre">
                    <div class="imgcarre"><img src="img/ouvert.png" alt=""></div>
                    <h3>Disponibilité</h3>
                    <p>
                        Nous sommes ouverts tous les jours de la semaine, de 10h à 20h.
                    </p>
                </div>

                <div class="carre">
                    <div class="imgcarre"><img src="img/livraison.png" alt=""></div>
                    <h3>Service livraison</h3>
                    <p>
                        Livraison express 48 heures, avec retour possible !
                    </p>
                </div>
            </div>
        </div>
        <div class="containerindex">
            <div class="bandeaupromo">
                <h1>Exemples de produits</h1>
                <div class="showroompromo">
                <?php
                 
               
                $listeProduits = execRequete("SELECT * FROM produits p JOIN categories c ON c.id_categorie = p.id_categorie ORDER BY RAND() LIMIT 0,4 ");

                while($produit = $listeProduits-> fetch() ){
                    ?>
                    <div class="promo">
                                <a href="<?= URL."fiche_produit.php?id_produit=". $produit["id_produit"] ?>">
                                <img src="<?= URL."photo/".$produit["photo"] ?>" alt="<?= $produit["titre"]?>" class="img-fluid vignetteindex"></a>
                                <p><?= $produit["marque"]." | ".$produit["titrecateg"]." | ".$produit["prix"] ?>€</p>            <a class="bouttonpromo" href="<?= URL."fiche_produit.php?id_produit=". $produit["id_produit"] ?>">VOIR</a>


                        </div>
                    
                    <?php
                }
            ?>
            
        </div>
<a href="<?= URL.'produits.php'?>" class="go">ACCEDER AUX PRODUITS</a>     

            </div>
            </div>



        </div> <!-- FIN CONTAINER -->
    </main>


<?php 
    require_once('inc/footer.php');

?>