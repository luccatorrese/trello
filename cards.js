
console.log("Si tu m'as trouvé, c'est que tu as regardé dans la console !");

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
