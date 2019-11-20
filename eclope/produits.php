 <?php
require_once('inc/init.php');

$title = "Nos produits";

if(isset($_SESSION["attente"])){
    echo $_SESSION["attente"];
    unset($_SESSION["attente"]);
}
$produitsParPage = 6;
$produitsTotalesReq = $pdo->query('SELECT * FROM produits');
$produitsTotales = $produitsTotalesReq->rowCount();
$pagesTotales = ceil($produitsTotales/$produitsParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$produitsParPage;
require_once('inc/header.php');
?>
<main>
    <div class="container">
        <h1 style="margin-top : 60px">Nos produits</h1>
        <div class="produits">
    <div class="sidebarleft">
        <h3>FILTRES</h3>
        <h4>Catégories</h4>
        <ul>
        <li><a class="liensfiltre <?= (!isset($_GET['categ']) || (isset($_GET['categ']) && $_GET['categ'] == '*') ) ? 'actif' : ''?>" href="?categ=*">Tout</a></li>
        <?php
    // catégorie de produits
    
    $resultat=execRequete("SELECT * FROM categories");
    while($categorie = $resultat-> fetch()){
        ?>
        <li><a class="liensfiltre <?= ( isset($_GET['categ']) && $_GET['categ'] == $categorie['id_categorie'] ) ? 'actif' : '' ?>"href="?categ=<?= $categorie["id_categorie"] ?>" ><?= $categorie["titrecateg"] ?></a></li>
        <?php
            }
        ?>
    </ul>
    <hr>
    <h4>Marque</h4>
    <ul>
        <li><a class="liensfiltre <?= (!isset($_GET['mark']) || (isset($_GET['mark']) && $_GET['mark'] == '*') ) ? 'actif' : ''?>" href="?mark=*">Tout</a></li>
        <?php
    // catégorie de produits
    $resultat=execRequete("SELECT DISTINCT marque FROM produits");
    while($categorie = $resultat-> fetch()){
        ?>
        <li><a class="liensfiltre <?= ( isset($_GET['mark']) && $_GET['mark'] == $categorie['marque'] ) ? 'actif' : '' ?>"href="?mark=<?= $categorie["marque"] ?>" ><?= $categorie["marque"] ?></a></li>
        <?php
            }
        ?>
    </ul>
    <hr>
    <h4>Prix (non fonctionnel)</h4>
    <ul>
        <li><a class="liensfiltre <?= (!isset($_GET['price']) || (isset($_GET['price']) && $_GET['price'] == '*') ) ? 'actif' : ''?>" href="?price=*" class="liensfiltre">Tous les prix</a></li>   
        <li><a href="?price=0-20" class="liensfiltre <?= ( isset($_GET['price']) && $_GET['price'] <20 && $_GET['price'] !="*") ? 'actif' : '' ?>">0 - 20€</a></li>   
        <li><a href="?price=20-50" class="liensfiltre <?= ( isset($_GET['price']) && $_GET['price'] >= 20 AND $_GET['price'] < 50  ) ? 'actif' : '' ?>">20€ - 50€</a></li>   
        <li><a href="?price=50+" class="liensfiltre <?= ( isset($_GET['price']) && $_GET['price'] >= 50 ) ? 'actif' : '' ?>">50€ et +</a></li>   

    </ul>
    
    </div>
    <div class="showroom">
    <?php   
$whereClause='';
$arg = array();

if(isset($_GET['categ']) && $_GET['categ'] != '*'){
    $whereClause = "WHERE c.id_categorie = :id_categorie";
    $arg['id_categorie'] = $_GET['categ'];
}
if(isset($_GET['mark']) && $_GET['mark'] != '*'){
    $whereClause = "WHERE marque = :marque";
    $arg['marque'] = $_GET['mark'];
}

$listeProduits = execRequete("SELECT c.titrecateg,p.photo, p.titre,p.marque, p.prix ,p.id_produit FROM produits p JOIN categories c ON c.id_categorie = p.id_categorie $whereClause ORDER BY id_produit DESC LIMIT $depart,$produitsParPage ",$arg );

while($produit = $listeProduits-> fetch() ){
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



</div>



    </div>
    <div class="pagination">
    <?php

    if($pageCourante>2 ){
        echo'<a class="lienspagination" href="produits.php?page=1"><i class="fas fa-fast-backward"></i></a>';
    }
    if($pageCourante>1 ){
        $precedent=$pageCourante-1;
        echo'<a class="lienspagination" href="produits.php?page='.$precedent.'"><i class="fas fa-backward"></i></a>';   
    }
 
    if(!isset($_GET["categ"]) OR $_GET['categ']=='*') {
    for($i=1;$i<=$pagesTotales;$i++) {
   
         if($i == $pageCourante) {
            echo '<a  class="actifa lienspagination">'.$i.'</a>';
         } else {
            echo '<a  class=" lienspagination" href="produits.php?page='.$i.'">'.$i.'</a> ';
         }
        
      }
    if($pageCourante<$pagesTotales){

        $suivant=$pageCourante+1;
        echo'<a class="lienspagination" href="produits.php?page='.$suivant.'"><i class="fas fa-forward"></i></a>';    
               
      }  
      $pagesTotales = array($pagesTotales);
      $lastPage = max($pagesTotales);

      if($pageCourante<=$lastPage-2){

      echo'  <a class="lienspagination" href="produits.php?page='.$lastPage.'"><i class="fas fa-fast-forward"></i></a>';
      }
    }
?>
</div>
    </div> <!-- FIN PRODUITS -->
    </div> <!-- FIN CONTAINER -->
</main>



<?php

require_once('inc/footer.php');