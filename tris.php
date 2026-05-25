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

function fusionner($tab_g, $tab_d) {
    $tab_f = [];
    $n_g = count($tab_g); 
    $n_d = count($tab_d);
    $i = $j = $k = 0;

    while($i < $n_g && $j < $n_d) {
        # on compare, on ajoute le min à la fusion et on incrémente les bons itérateurs 
        if($tab_g[$i] <= $tab_d[$j])
            $tab_f[$k] = $tab_g[$i++];
        else
            $tab_f[$k] = $tab_d[$j++];
        $k++;
    }

    # en quittant while, un des deux tableaux est entièrement parcouru 
    while($i < $n_g) {
        # compléter $tab_f par ce qui reste de $tab_g
        $tab_f[$k++] = $tab_g[$i++];
    }
    
    while($j < $n_d) {
        # compléter $tab_f par ce qui reste de $tab_d
        $tab_f[$k++] = $tab_d[$j++];
    }
    
    return $tab_f; // Correction : $tab_f au lieu de $t
}

function triFusion($tab){
    $n = count($tab);

    if ($n <= 1) return $tab ;

    $milieu = (int) ($n / 2);
    
    $gauche = triFusion ( array_slice ($tab , 0, $milieu ));
    $droite = triFusion ( array_slice ($tab , $milieu ));

    return fusionner ( $gauche , $droite );   
}

function triFusionChrono ( $tab ) {
    $debut = microtime ( true );
    triFusion ( $tab );
    $fin = microtime ( true );
    return round (( $fin - $debut ) * 1000 , 2); // en ms
}