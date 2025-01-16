<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon tableau Trello</title>
	<link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
	<link rel="icon" href="images/clipboard_120835.png" alt="Icône" />
</head>

<body>
    <!-- Présentation du site -->

	<header>
            <img src="images/Logo_Trello.svg" alt="Logo Trello" style="height: auto; width: 10vw;" />
            <nav>
                <ul>
                    <li>Menu principal</li>
                    <li><a href="history.html">Histoire</a></li>
                    <li><a href="data.html">Données</a></li>
                </ul>
            </nav>
        </header>

    <h1>Bienvenue !</h1>
    <h2>Description</h2>
    <p>Je te souhaite la bienvenue sur mon tableau Trello ! Cette page Web de type interactive sert à structurer des tâches, et s'inspire directement du site <a href="https://www.trello.com">Trello</a>, qui permet de gérer des projets. L'ensemble des données de cette page Web sont traitées dans la base de données phpMyAdmin, appelée "trello". Dedans tu peux rajouter le travail à faire, les prochaines sorties en extérieur, etc...</p>

    <h2>Mes tableaux</h2>
	<p><b>Note :</b> ce tableau Trello se base sur les cartes qui ont été créées dans la table "groupes" de la base de données "trello". Plus l'utilisateur ajoute de cartes via phpMyAdmin, plus le site contiendra de cartes. Les données s'affichent dans le rectangle blanc ci-dessous, et sont contenues dans la table "taches".</p>

    <?php
		// Connexion à la base de données (à remplacer par vos propres informations de connexion)
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_trello";
		// Connexion à la base de données
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Vérification de la connexion
		if ($conn->connect_error) {
			die("Connexion échouée: " . $conn->connect_error);
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
				$query = "SELECT * FROM taches WHERE id_groupe = ?";

				// Préparation de la requête
				$stmt = $conn->prepare($query);

				// Liaison des valeurs aux paramètres
				$stmt->bind_param("s", $row["id"]);

				// Exécution de la requête
				$stmt->execute();

				// Résultat de la requête
				$resulttemp = $stmt->get_result();

				// Vérifier s'il y a des résultats
				if ($resulttemp->num_rows > 0) 
				{
					// Parcourir chaque ligne de résultat
					while($rowtemp = $resulttemp->fetch_assoc()) // rowtemp[id] = 1 et row[titre] = 
					{
						// Afficher la valeur de la variable "titre" pour chaque ligne
						echo '<div class="sub-card"><b>'. $rowtemp["titre"] . "<br>" . $rowtemp["description"] . "<br>" . $rowtemp["categorie"]. '</div>';
					}
				} 
				echo '<div class="sub-card add">+</div>

				</div>
				</div>';
			}
		}
// Fermer la connexion à la base de données
$conn->close();
?>

	<!-- Boîte de dialogue bonus -->

	<dialog>
		<p>A suivre...</p>
		<form method="dialog">
		<button>OK</button>
		</form>
	</dialog>
	<button>Test Popup</button>

	<!-- script JavaScript permettant de faire fonctionner la boîte de dialogue -->

    <script>
		/* sélectionneur de requêtes */
        const popup = document.querySelector("dialog");
        const showButton = document.querySelector("dialog + button");
        const closeButton = document.querySelector("dialog button");

        // Le bouton "Test Popup" ouvre la boîte de dialogue. Ajout d'un écouteur d'évènements pour la constante showButton, avec fonction showModal.
        showButton.addEventListener("click", () => {
            popup.showModal();
        });

        // Le bouton "OK" ferme la popup. Ajout d'un écouteur d'évènements pour la constante closeButton, puis fonction close.
        closeButton.addEventListener("click", () => {
            popup.close();
        });


    </script>

	<!-- pied de page pour ajouter davantage d'élégance à la page -->
	<footer>
        <nav>
            <ul>
				<li><img src="images/trello_simple.png" alt="Logo Trello sans lettres" style="height: auto; width: 3vw;" /></li>
                <li>© 2025 Université de Corse. Tous droits réservés.</li>
            </ul>
        </nav>
    </footer>

</body>
</html>
﻿