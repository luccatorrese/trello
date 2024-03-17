<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.0
 */

/**
 * Database `trello`
 */

/* `trello`.`groupes` */
$groupes = array(
  array('id' => '1','titre' => 'A faire'),
  array('id' => '2','titre' => 'Terminé')
);

/* `trello`.`taches` */
$taches = array(
  array('id' => '1','id_groupe' => '1','titre' => 'Faire le devoir maison.','description' => 'Devoir portant sur la création de cartes en HTML.','categorie' => 'Informatique.','date_limite' => '2024-03-21 15:08:35','date_ajout' => '2024-02-29 15:10:57'),
  array('id' => '2','id_groupe' => '1','titre' => 'Test','description' => 'Ajout de carte','categorie' => 'Aucune','date_limite' => '2024-03-17 10:56:13','date_ajout' => '2024-03-17 11:56:37'),
  array('id' => '6','id_groupe' => '2','titre' => 'Convention de stage','description' => 'Signer la convention','categorie' => 'Catégorie','date_limite' => '2024-03-17 16:21:38','date_ajout' => '2024-03-17 16:22:33'),
  array('id' => '5','id_groupe' => '1','titre' => 'Test','description' => 'Description','categorie' => 'Catégorie Informatique','date_limite' => '2024-03-17 15:19:18','date_ajout' => '2024-03-17 16:19:49'),
  array('id' => '7','id_groupe' => '2','titre' => 'Devoir terminé','description' => 'Le 17 mars','categorie' => 'Catégorie','date_limite' => '2024-03-17 15:28:12','date_ajout' => '2024-03-17 16:28:40')
);
