function typeDeCarte(valeurDeLaClasse) {

    let masterCard = "mastercard";
    let visa = "visa";

    if (valeurDeLaClasse.includes(masterCard)) {
        return masterCard;
    }
    if (valeurDeLaClasse.includes(visa)) {
        return visa;
    }
    return "rien";
}

function verifierNumeroCarteBleue() {

    let valeurNumeroCarteBleue = document.getElementById('numeroCarte');

    console.log(valeurNumeroCarteBleue.className);

    var typeDeLaCarte = typeDeCarte(valeurNumeroCarteBleue.className);

    if (valeurNumeroCarteBleue.length === 0) {
        return false;
    }

    console.log(valeurNumeroCarteBleue.value.length);
    console.log(typeDeLaCarte);

    return false;
}
