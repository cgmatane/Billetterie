function verifierNumeroCarteBleue() {

    const nombreDeChiffreMasterCard = 19;
    const nombreDeChiffreVisa = [19,23];

    let valeurNumeroCarteBleue = document.getElementById('numeroCarte');
    let nombreDeChiffreCarteBleue = valeurNumeroCarteBleue.value.length;
    let typeDeLaCarte = typeDeCarte(valeurNumeroCarteBleue.className);

    if (typeDeLaCarte === "rien") {
        return false;
    }

    let conditionNombreDeChiffreMasterCardValide = typeDeLaCarte === "mastercard" &&
        nombreDeChiffreCarteBleue === nombreDeChiffreMasterCard;
    let conditionNombreDeChiffreVisaValide = typeDeLaCarte === "visa" &&
        (nombreDeChiffreCarteBleue === nombreDeChiffreVisa[0] || nombreDeChiffreCarteBleue === nombreDeChiffreVisa[1]);

    if (conditionNombreDeChiffreMasterCardValide || conditionNombreDeChiffreVisaValide) {
        return true;
    }

    return false;
}

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

function verifierNom() {

    let valeurNomEntier = document.getElementById('nom').value;
    let valeurNomSepare = valeurNomEntier.split(" ");

    if (valeurNomSepare.length !== 2 || !(/^[a-zA-Z\s]*$/.test(valeurNomEntier))) {
        return false;
    }

    return true;
}

function verifierCvc() {

    const nombreDeNumeroCvc = 3;

    let valeurNumeroCvc = document.getElementById('numeroCvc').value;

    if (valeurNumeroCvc.length === nombreDeNumeroCvc) {
        return true;
    }

    return false;
}
