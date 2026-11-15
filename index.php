<?php
/**
 * Fichier : index.php
 * Rôle : Point d'entrée de l'application — charge les dépendances, déclare les données
 *        et génère l'affichage HTML dynamique.
 */

// 1. Chargement des fichiers requis (require_once évite les doublons et bloque en cas d'oubli)
require_once './config/settings.php';
require_once './functions/pricing.php';
require_once './functions/labels.php';
require_once './functions/filters.php';

// 2. Tableau multidimensionnel des véhicules (au moins 4 véhicules demandés)
$voitures = [
    [
        'id'        => 1,
        'modele'    => 'Renault Clio',
        'jours'     => 3,
        'categorie' => 'ECO',
        'statut'    => 'DISPO'
    ],
    [
        'id'        => 2,
        'modele'    => 'Range Rover',
        'jours'     => 10,
        'categorie' => 'LUXE',
        'statut'    => 'LOUEE'
    ],
    [
        'id'        => 3,
        'modele'    => 'Dacia Duster',
        'jours'     => 5,
        'categorie' => 'SUV',
        'statut'    => 'DISPO'
    ],
    [
        'id'        => 4,
        'modele'    => 'Peugeot 208',
        'jours'     => 8,
        'categorie' => 'ECO',
        'statut'    => 'MAINTENANCE'
    ],
    [
        'id'        => 5,
        'modele'    => 'Mercedes Classe E',
        'jours'     => 2,
        'categorie' => 'LUXE',
        'statut'    => 'DISPO'
    ]
];

// 3. Filtrage des véhicules disponibles
$disponibles = filtrerDisponibles($voitures);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flotte AutoLoc</title>
    <!-- Appel de la feuille de style CSS -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <h1>Flotte AutoLoc</h1>

    <!-- Liste des cartes véhicules -->
    <div class="grille">
        <?php foreach ($voitures as $v): ?>
            <?php
                // Appels des fonctions pour préparer l'affichage de la carte
                $badge         = getBadgeCategorie($v['categorie']);
                $libelleStatut = getLibelleStatut($v['statut']);
                $prix          = calculerPrixLocation($v['jours'], TARIF_JOUR_BASE);
            ?>
            <article class="carte statut-<?= strtolower($v['statut']) ?>">
                <h2><?= $v['modele'] ?> (<?= $v['jours'] ?> j)</h2>

                <span class="badge <?= $badge['classe'] ?>">
                    <?= $badge['libelle'] ?>
                </span>

                <p><strong>Statut :</strong> <?= $libelleStatut ?></p>

                <p><strong>Prix estimé :</strong> <?= $prix ?> TND</p>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Section Récapitulatif -->
    <section class="recapitulatif">
        <h2>Récapitulatif</h2>

        <p><strong>Nombre total de véhicules :</strong> <?= count($voitures) ?></p>

        <h3>Véhicules disponibles :</h3>
        <ul>
            <?php foreach ($disponibles as $d): ?>
                <?php $b = getBadgeCategorie($d['categorie']); ?>
                <li><?= $d['modele'] ?> - <?= $b['libelle'] ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

</body>
</html>
