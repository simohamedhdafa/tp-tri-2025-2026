<?php 

function triBulles($tab){
    $n = count($tab);
    for($i=0; $i<$n-1; $i++){
        for($j=0; $j<$n-1-$i; $j++){
            if($tab[$j]>$tab[$j+1]){
                $temp = $tab[$j];
                $tab[$j] = $tab[$j+1];
                $tab[$j+1] = $temp;
            }
        }
    }
    return $tab;
}

function triBullesCompte($tab){
    $n = count($tab);
    $compteur = 0;
    for($i=0; $i<$n-1; $i++){
        for($j=0; $j<$n-1-$i; $j++){
            $compteur++;
            if($tab[$j]>$tab[$j+1]){
                $temp = $tab[$j];
                $tab[$j] = $tab[$j+1];
                $tab[$j+1] = $temp;
            }
        }
    }
    return $compteur;
}

function triBullesChrono ( $tab ) {
    $debut = microtime ( true );
    triBulles ( $tab );
    $fin = microtime ( true );
    return round (( $fin - $debut ) * 1000 , 2); // en ms
}

function triSelectionChrono ( $tab ) {
    $debut = microtime ( true );
    triSelection ( $tab );
    $fin = microtime ( true );
    return round (( $fin - $debut ) * 1000 , 2); // en ms
}

function triSelection($tab){
    $n = count($tab);
    for($i=0; $i<$n-1; $i++){
        // trouver le minimum et l'echanger avec le premier s'il le faut
        $i_min = 0;
        for($j=$i+1; $j<$n-1; $j++){
            if($tab[$j] < $tab[$i_min]){
                $i_min = $j;
            }
        }
        if($i_min !== $i){
            $temp = $tab[$i_min];
            $tab[$i_min] = $tab[$i];
            $tab[$i] = $temp;
        }
    }
    return $tab;
}

function triSelectionCompte($tab){
    $n = count($tab);
    $compteur = 0;
    for($i=0; $i<$n-1; $i++){
        // trouver le minimum et l'echanger avec le premier s'il le faut
        $i_min = 0;
        for($j=$i+1; $j<$n-1; $j++){
            $compteur++;
            if($tab[$j] < $tab[$i_min]){
                $i_min = $j;
            }
        }
        $compteur++;
        if($i_min !== $i){
            $temp = $tab[$i_min];
            $tab[$i_min] = $tab[$i];
            $tab[$i] = $temp;
        }
    }
    return $compteur;
}

function triInsertion($tab){
    $n = count($tab);
    // partie triée : le premier élément 
    for($i=1; $i<$n; $i++){
        // inserer $tab[$i] par décalage dans la partie triée
        $cle = $tab[$i];
        $j=$i-1;
        while($j>=0 && $cle<$tab[$j]){
            $tab[$j+1]= $tab[$j]; 
            $j--;
        }
        $tab[$j+1] = $cle;
    }
    return $tab;
}

function triInsertionChrono ( $tab ) {
    $debut = microtime ( true );
    triInsertion ( $tab );
    $fin = microtime ( true );
    return round (( $fin - $debut ) * 1000 , 2); // en ms
}

function triInsertionCompte($tab){
    $n = count($tab);
    $compteur = 0;
    // partie triée : le premier élément 
    for($i=1; $i<$n; $i++){
        // inserer $tab[$i] par décalage dans la partie triée
        $cle = $tab[$i];
        $j=$i-1;
        while($j>=0 && $cle<$tab[$j]){
            $compteur += 1;
            $tab[$j+1]= $tab[$j]; 
            $j--;
        }
        //$compteur += 1;
        $tab[$j+1] = $cle;
    }
    return $compteur;
}