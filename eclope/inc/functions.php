<?php
// fonction qui teste qu'un membre est connecté
function isConnected(){
    if( isset($_SESSION['membre']) ){
        return true;
    }else{
        return false;
    }
}

// fonction qui teste qu'un membre est administrateur
function isAdmin(){
    if( isConnected() && $_SESSION['membre']['statut'] == 1){
        return true;
    }
    else{
        return false;
    }
}

function execRequete($req, $params = array() ){

    // Sanitize / Assainissement
    if ( !empty($params) ){
        foreach($params as $indice => $valeur){
            $params[$indice] = htmlspecialchars(trim($valeur),ENT_NOQUOTES);
        }
    }
    global $pdo; // globalisation de la variable $pdo pour y avoir droit dans cet espace local de la fonction
    $r = $pdo->prepare($req);
    $r->execute($params);
    return $r;
}