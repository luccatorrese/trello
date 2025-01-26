// Test console navigateur
console.log("Ceci est une ligne de test qui s'affiche dans la console du navigateur.");

// Insertion des constantes JavaScript qui récupèrent l'élément par leur ID

// Récupération des éléments par l'ID du popup (Boutons Ajouter, modifier et supprimer).
// Voir fichier homework.php.

const addWorkDialog = document.getElementById('add-work');
const editWorkDialog = document.getElementById('edit-work');
const deleteWorkDialog = document.getElementById('delete-work');

// Récupération de l'ID de chaque bouton, y compris ceux inclus dans les popups.

const addButton = document.getElementById('add-button');
const editButton = document.getElementById('edit-button');
const deleteButton = document.getElementById('delete-button');
const sendButton = document.getElementById('send-button');
const updateButton = document.getElementById('update-button');

const confirmDeleteButton = document.getElementById('confirm-delete-button');
const cancelDeleteButton = document.getElementById('cancel-delete-button');

// Afficher la Popup "Ajouter un devoir"
addButton.addEventListener('click', () => {
    addWorkDialog.showModal();
});

// Fermeture du popup lorsque l'utilisateur clique sur "OK"
sendButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prévient la valeur par défaut
    addWorkDialog.close();
});

// Afficher la Popup "Modifier un devoir"
editButton.addEventListener('click', () => {
    editWorkDialog.showModal();
});

//Fermeture Popup "Modifier un devoir". Ajout d'un écouteur d'évènements au bouton "Mettre à jour".
updateButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prévient la valeur par défaut
    editWorkDialog.close();
});

// Afficher la Popup "Supprimer un devoir"
deleteButton.addEventListener('click', () => {
    deleteWorkDialog.showModal();
});

// Confirmer la suppression du devoir : si l'utilisateur clique sur Oui.
confirmDeleteButton.addEventListener('click', () => {
    console.log('Carte supprimée');
    deleteWorkDialog.close();
});

// Annulation suppression : si l'utilisateur clique sur Non.
cancelDeleteButton.addEventListener('click', () => {
    deleteWorkDialog.close();
});
