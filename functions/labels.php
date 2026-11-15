<?php
/**
 * Fichier : functions/labels.php
 * Rôle : Convertir les codes de catégories et de statuts en libellés et classes CSS.
 */

/**
 * Retourne le libellé et la classe CSS du badge selon le code catégorie.
 *
 * @param string $code Code de la catégorie ('ECO', 'SUV', 'LUXE')
 * @return array       Tableau associatif ['libelle' => ..., 'classe' => ...]
 */
function getBadgeCategorie(string $code): array
{
    switch ($code) {
        case 'ECO':
            return ['libelle' => 'Économique', 'classe' => 'badge-eco'];
        case 'SUV':
            return ['libelle' => 'SUV familial', 'classe' => 'badge-suv'];
        case 'LUXE':
            return ['libelle' => 'Premium', 'classe' => 'badge-luxe'];
        default:
            return ['libelle' => 'Inconnue', 'classe' => 'badge-inconnu'];
    }
}

/**
 * Retourne le texte lisible correspondant au code du statut.
 *
 * @param string $code Code du statut ('DISPO', 'LOUEE', 'MAINTENANCE')
 * @return string      Libellé complet du statut
 */
function getLibelleStatut(string $code): string
{
    switch ($code) {
        case 'DISPO':
            return 'Disponible immédiatement';
        case 'LOUEE':
            return 'Actuellement louée';
        case 'MAINTENANCE':
            return 'En maintenance';
        default:
            return 'Statut inconnu';
    }
}
