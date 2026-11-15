<?php
/**
 * Fichier : functions/filters.php
 * Rôle : Filtrer le tableau de véhicules avec array_filter et fonction fléchée.
 */

/**
 * Retourne uniquement les véhicules dont le statut est 'DISPO'.
 *
 * @param array $voitures Tableau complet des véhicules
 * @return array          Tableau filtré et réindexé (0, 1, 2...)
 */
function filtrerDisponibles(array $voitures): array
{
    // array_filter conserve les clés d'origine (ex: 0, 2, 4).
    // array_values() réindexe proprement le tableau (0, 1, 2).
    return array_values(
        array_filter(
            $voitures,
            fn(array $v): bool => $v['statut'] === 'DISPO'
        )
    );
}
