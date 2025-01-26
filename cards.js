
console.log("Si tu m'as trouvé, c'est que tu as regardé dans la console !");

// Insertion des constantes JavaScript qui récupèrent l'élément par leur ID

const addWorkDialog = document.getElementById('add-work');
const editWorkDialog = document.getElementById('edit-work');
const deleteWorkDialog = document.getElementById('delete-work');

const addButton = document.getElementById('add-button');
const changeButton = document.getElementById('change-button');
const deleteButton = document.getElementById('delete-button');
const sendButton = document.getElementById('send-button');
const updateButton = document.getElementById('update-button');

const confirmDeleteButton = document.getElementById('confirm-delete-button');
const cancelDeleteButton = document.getElementById('cancel-delete-button');

// Popup "Ajouter un devoir"
addButton.addEventListener('click', () => {
    addWorkDialog.showModal();
});

// Fermer la popup lorsque l'utilisateur clique sur "OK"
sendButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prévient la valeur par défaut
    addWorkDialog.close();
});

//Popup "Modifier un devoir"
changeButton.addEventListener('click', () => {
    editWorkDialog.showModal();
});

//Fermeture Popup "Modifier un devoir"
updateButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prévient la valeur par défaut
    editWorkDialog.close();
});

// Popup "Supprimer un devoir"
deleteButton.addEventListener('click', () => {
    deleteWorkDialog.showModal();
});

// Confirmer la suppression du devoir
confirmDeleteButton.addEventListener('click', () => {
    console.log('Carte supprimée');
    deleteWorkDialog.close();
});

// Annulation suppression
cancelDeleteButton.addEventListener('click', () => {
    deleteWorkDialog.close();
});
