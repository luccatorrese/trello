<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Gestion des devoirs</title>
	<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="Lucca Torrese">
    <meta name="keywords" content="trello,travail,devoirs,work,javascript">
    <meta name="description" content="Retrouve tous les devoirs à effectuer dans une seule page.">
	<link rel="icon" href="images/trello_simple.png">
	<script src="cards.js" defer></script>

</head>

<body>
    <!-- Présentation du site -->

	<header>
		<nav>
			<ul>
				<li><a href="index.html">Accueil</a></li>
                <li><a href="homework.php">Gestion des devoirs</a></li>
                <li><a href="about.html">A propos</a></li>
            </ul>
        </nav>
    </header>

	<div class="homework-text">
		<h1>Gestion des devoirs</h1>
		<p>Sur cette page, tu peux gérer l'ensemble de tes devoirs en temps réel. Choisis ce que tu souhaites
		effectuer.</p>

		<dialog id="add-work">
			<p><b>Information</b></p>
			<p>Veuillez entrer un nom de devoir, ainsi qu'une description, et une catégorie de devoir.</p>
			<label for="cardTitle">Titre :</label>
			<input type="text" id="cardTitle" name="cardTitle" required />
			<label for="cardDescription">Description :</label>
			<textarea id="cardDescription" name="cardDescription" required></textarea>
			<label for="cardCategory">Catégorie :</label>
			<input type="text" id="cardCategory" name="cardCategory" required />
			<button type="submit" id="send-button">OK</button>
		</dialog>

		<dialog id="edit-work">
			<p><b>Information</b></p>
			<p>Veuillez modifier les informations du devoir sélectionné.</p>
			<label for="editTitle">Titre :</label>
			<input type="text" id="editTitle" name="editTitle" required />
			<label for="editDescription">Description :</label>
			<textarea id="editDescription" name="editDescription" required></textarea>
			<label for="editCategory">Catégorie :</label>
			<input type="text" id="editCategory" name="editCategory" required />
			<button type="submit" id="update-button">Mettre à jour</button>
		</dialog>

		<dialog id="delete-work">
			<p><b>Alerte</b></p>
			<p>Êtes-vous sûr de vouloir supprimer ce devoir ?</p>
			<button id="confirm-delete-button">Oui</button>
			<button id="cancel-delete-button">Non</button>
		</dialog>

		<button type="button" id="add-button" style="background-color: #48b427;">
		<img src="images/ajouter.png" style="max-width: 1.5vw; padding: 3px;">Ajouter un devoir</button>
		<button type="button" id="edit-button" style="background-color: #b3bc16;">
		<img src="images/editer.png" style="max-width: 1.5vw; padding: 3px;">Modifier un devoir</button>
		<button type="button" id="delete-button" style="background-color: #cd1717;">
		<img src="images/supprimer.png" style="max-width: 1.5vw; padding: 3px;">Supprimer un devoir</button>
	</div>

    <?php
		// Connexion à la base de données (à remplacer par vos propres informations de connexion)
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_trello";
		// Connexion à la base de données
		$conn = new mysqli($host, $username, $password, $dbname);

		// Vérification de la connexion
		if ($conn->connect_error) {
			die("La connexion a échouée : " . $conn->connect_error . ". Vérifiez que la base de données est bien existante.");
		}

		// Requête SQL pour sélectionner toutes les données de la table "groupe"
		$sql = "SELECT * FROM groupes";
		$result = $conn->query($sql);

		// Vérifier s'il y a des résultats
		if ($result->num_rows > 0) {
			// Parcourir chaque ligne de résultat
			while($row = $result->fetch_assoc()) {
				//row[id] = 1 et row[titre] = "a faire"
				// Afficher la valeur de la variable "titre" pour chaque ligne
				echo '<div class="card">
				<div class="card-header">
				<div class="card-header-text">'. $row["titre"] .'</div>
				</div>
				<div class="card-content">';
				
				// Requête SELECT avec WHERE
				$query = "SELECT * FROM taches WHERE id_groupe = ?;";

				// Préparation de la requête
				$stmt = $conn->prepare($query);

				// Liaison des valeurs aux paramètres
				$stmt->bind_param("s", $row["id"]);

				// Exécution de la requête
				$stmt->execute();

				// Résultat de la requête
				$resulttemp = $stmt->get_result();

				// Vérification des résultats
				if ($resulttemp->num_rows > 0) 
				{
					// Parcourir chaque ligne de résultat
					while($rowtemp = $resulttemp->fetch_assoc()) // rowtemp[id] = 1 et row[titre] = 
					{
						// Afficher la valeur de la variable "titre" pour chaque ligne
						echo '<div class="sub-card"><b>'. $rowtemp["titre"] . "<br>" . $rowtemp["description"] . "<br>" . $rowtemp["categorie"]. '</b></div>';
					}
				} 
				echo '<div class="sub-card add"><img src="images/ajouter.png" style="max-width: 1.5vw; padding: 3px;"></div>

				</div>
				</div>';
			}
		}
		// Fermeture de la connexion à la base de données
		$conn->close();
	?>

	<!-- pied de page -->
    <footer>
        <nav>
            <ul>
                <li> © 2025 Université de Corse. Tous droits réservés. </li>
            </ul>
        </nav>
    </footer>

</body>
</html>
﻿