function verifierFormulaire() {

    if (verifierNumeroCarteBleue() && verifierNom() && verifierDateExpiration() && verifierCvc())
        return true;

    return false;
}

function verifierNumeroCarteBleue() {

    const nombreDeChiffreMasterCard = 19;
    const nombreDeChiffreVisa = [19,23];

    const idDivErreurNumeroCarte = "erreurNumeroCarte";

    let valeurNumeroCarteBleue = document.getElementById('numeroCarte');
    let nombreDeChiffreCarteBleue = valeurNumeroCarteBleue.value.length;
    let typeDeLaCarte = typeDeCarte(valeurNumeroCarteBleue.className);

    if (typeDeLaCarte === "rien") {
        afficherErreur(idDivErreurNumeroCarte,
            "La carte n'est ni une mastercard ni une carte visa");
        return false;
    }

    let conditionNombreDeChiffreMasterCardValide = typeDeLaCarte === "mastercard" &&
        nombreDeChiffreCarteBleue === nombreDeChiffreMasterCard;
    let conditionNombreDeChiffreVisaValide = typeDeLaCarte === "visa" &&
        (nombreDeChiffreCarteBleue === nombreDeChiffreVisa[0] || nombreDeChiffreCarteBleue === nombreDeChiffreVisa[1]);

    if (conditionNombreDeChiffreMasterCardValide || conditionNombreDeChiffreVisaValide) {

        effacerErreur(idDivErreurNumeroCarte);
        return true;
    }

    afficherErreur(idDivErreurNumeroCarte,
        "Le numero de carte ne contient pas le bon nombre de numéros");
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

    if (valeurNomSepare.length !== 2 || !(/^[A-Z\s]*$/.test(valeurNomEntier))) {
        return false;
    }

    return true;
}

function verifierDateExpiration() {

    let valeurDateExpiration = document.getElementById('dateExpiration').value;
    let valeurDateExpirationSepare = valeurDateExpiration.split(" ");

    if (valeurDateExpirationSepare.length !== 3) {
        return false;
    }

    let valeurAnnee = valeurDateExpirationSepare[2];
    let valeurAnneeActuelle = new Date().getFullYear();

    let valeurMois = valeurDateExpirationSepare[0];
    let valeurMoisActuelle = new Date().getMonth() + 1;

    if (valeurAnnee < valeurAnneeActuelle)
        return false;
    else if (!(valeurAnnee > valeurAnneeActuelle) && valeurMois <= valeurMoisActuelle)
        return false;
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

function afficherErreur(idDuDiv, messageErreur) {

    document.getElementById(idDuDiv).style.display = "block";
    document.getElementById(idDuDiv).innerHTML = messageErreur;
}

function effacerErreur(idDuDiv) {

    document.getElementById(idDuDiv).style.display = "none";
}


