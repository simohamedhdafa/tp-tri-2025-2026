<?php

require_once "tris.php";

$tailles = [100, 500, 1000, 2000, 5000, 10000];
$functions = ["triBulles", "triSelection", "triInsertion", "triFusion"];

$largeur_nom = 15;     // Largeur pour la colonne des noms d'algorithmes
$largeur_colonne = 12; // Largeur pour chaque colonne de temps

// Affichage de l'en-tête (les colonnes de tailles)
echo str_pad("Algorithme", $largeur_nom);
foreach ($tailles as $n) {
    echo str_pad("n=$n", $largeur_colonne);
}
echo "\n";

// Ligne de séparation visuelle
echo str_repeat("-", $largeur_nom + (count($tailles) * $largeur_colonne)) . "\n";

// Affichage des lignes de résultats
foreach($functions as $algorithme){
    // Aligner le nom de l'algorithme à gauche
    echo str_pad($algorithme, $largeur_nom);
    
    foreach($tailles as $n){
        // Génération du tableau dans le pire cas (décroissant)
        $tab = range($n, 1); 
        $nom_fonction = $algorithme . "Chrono"; 
        
        $temps = $nom_fonction($tab);
        
        // Préparer la chaîne de temps et l'aligner
        $texte_temps = $temps . " ms";
        echo str_pad($texte_temps, $largeur_colonne);
    }
    
    // Retour à la ligne à la fin des chronos d'un algorithme
    echo "\n";
}