/**
 * Funcion que añade una carta de la lista al campo de texto al pulsar un boton,
 * si la carta ya esta en el campo de texto no puede volver a añadirse y si ya hay
 * 15 cartas en el campo de texto no pueden añadirse más.
 */
function addCardToList() {
    const card = document.getElementById("cardList").value;
    const cardCount = document.getElementById("cardCount");
    let textArea = document.getElementById("deckCards");
    let textAreaValue = document.getElementById("deckCards").value;
    let totalCards = 0;
    let filteredCard = card;
    let count;

    //Contador para saber cuantas cartas hay en el campo de texto.
    count = +(cardCount.value.substr(cardCount.value.indexOf(" "), cardCount.value.indexOf("/")-5));

    // Si la lista tiene menos de 15 cartas añade una o dos copias de una carta.
    if ( count < 15 ){
        // Comprueba si la carta es x2 para filtrarla y poder compararla con el campo de texto.
        if (card.indexOf("x2") !== -1){
            filteredCard = card.substr(0, card.indexOf("x2"));
        }

        textAreaValue = textAreaValue.trim().split("\n");

        // Si la carta no esta en el campo de texto, la añade.
        if (!textAreaValue.some(x => x === card+",") && !textAreaValue.some(x => x === card+"x2,") && !textAreaValue.some(x => x === filteredCard+",")){
            textArea.append(card + ",\n")
        }
    }

    // Convierte las cartas del campo de texto a un array para comprobar el total de cartas que hay.
    textAreaValue = textArea.value.trim().split("\n");
    for (let i = 0; i < textAreaValue.length; i++){
        if (textAreaValue[i].indexOf("x2") !== -1){
            totalCards += 2;
        }else {
            totalCards += 1;
        }
    }

    // Muestra el cuantas cartas hay en el campo de texto, de un maximo de 15.
    cardCount.value = `Total ${totalCards}/15`;
}

// Funcion que borra la carta seleccionada de la lista, si esta esta en ella
function deleteCard() {
    const card = document.getElementById("cardList").value;
    const cardCount = document.getElementById("cardCount");
    const textArea = $("#deckCards");
    let textAreaValue = textArea.val();
    let totalCards = 0;

    textAreaValue = textAreaValue.trim().split("\n");

    //Si la carta esta en el campo de texto como copia unica, la borra.
    if (textAreaValue.some(x => x === card+",")){
        textArea.text(textArea.val().replace(`${card},`, "").trim());
        if (textArea.val() !== ""){
            textArea.text(textArea.val().replace(`${card},`, "").trim() + "\n");
        }
    }

    //Si la carta esta en el campo como copia doble, la borra.
    if (textAreaValue.some(x => x === card+"x2,")){
        textArea.text(textArea.val().replace(`${card}x2,`, "").trim());
        if (textArea.val() !== ""){
            textArea.text(textArea.val().replace(`${card}x2,`, "").trim() + "\n");
        }
    }

    //If para que no importe el tipo de copia que este seleccionado, si esta en la lista la borra.
    if (textAreaValue.some(x => x === card.replace("x2", "")+",")){
        textArea.text(textArea.val().replace((card.replace("x2", "")+","), "").trim());
        if (textArea.val() !== ""){
            textArea.text(textArea.val().replace((card.replace("x2", "")+","), "").trim() + "\n");
        }
    }


    // Convierte las cartas del campo de texto a un array para comprobar el total de cartas que hay.
    for (let i = 0; i < textAreaValue.length; i++){
        if (textAreaValue[i].indexOf("x2") !== -1){
            totalCards += 2;
        }else {
            totalCards += 1;
        }
    }

    // Muestra el cuantas cartas hay en el campo de texto, de un maximo de 15.
    cardCount.value = `Total ${totalCards}/15`;
}

// Funcion que borra la lista de cartas añadidas
function clearList() {
    const textArea = document.getElementById("deckCards");
    textArea.innerHTML = "";
}

$("#addBtn").click(function(){
    addCardToList()
});

$("#deleteBtn").click(function(){
    deleteCard();
});

$("#clearBtn").click(function(){
    clearList();
});

