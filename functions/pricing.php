<?php
/**
 * Fichier : functions/pricing.php
 * Rôle : Fonctions de calcul de prix avec typage strict PHP 8.
 */

/**
 * Calcule le prix estimé d'une location.
 * - Remise de 15 % si la durée est strictement supérieure à 7 jours (> 7).
 *
 * @param int   $jours     Nombre de jours de location
 * @param float $tarifJour Tarif journalier de base
 * @return float           Prix total calculé
 */
function calculerPrixLocation(int $jours, float $tarifJour): float
{
    // 1. Calcul du montant de base
    $total = $jours * $tarifJour;

    // 2. Application de la remise de 15% si strictement supérieur à 7 jours
    // Rappel : -15% revient à multiplier par (1 - 0.15) = 0.85
    if ($jours > 7) {
        $total = $total * 0.85;
    }

    // 3. Retourne uniquement la valeur numérique (aucun echo ici)
    return $total;
}
