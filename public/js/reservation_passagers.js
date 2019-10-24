let increment;
let passagerVitrine;
let divPassagers;
let boutonMoins;
let separateur = '-';

document.addEventListener("DOMContentLoaded", onLoad);


function onLoad() {
    increment = 0;
    passagerVitrine = document.getElementById('passager');
    divPassagers = document.getElementById('passagers');
    boutonMoins = document.getElementById('boutonRetirerPassager');
    ajouterPassager();
}

function ajouterPassager() {
    increment++;

    if (increment === 2) {
        boutonMoins.style.display = "inline-block";
    }
    let clonePassager = passagerVitrine.cloneNode(true);
    clonePassager.id += separateur+increment;
    clonePassager.getElementsByClassName('legendePassager')[0].innerHTML += " "+increment;
    clonePassager.getElementsByClassName('champNom')[0].id += separateur + increment;
    clonePassager.getElementsByClassName('champNom')[0].getElementsByTagName('input')[0].name = "nom[]";
    clonePassager.getElementsByClassName('champPrenom')[0].id += separateur + increment;
    clonePassager.getElementsByClassName('champPrenom')[0].getElementsByTagName('input')[0].name = "prenom[]";
    clonePassager.getElementsByClassName('champAge')[0].id += separateur + increment;
    clonePassager.getElementsByClassName('champAge')[0].getElementsByTagName('select')[0].name = "age[]";
    clonePassager.style.display = "block";
    divPassagers.appendChild(clonePassager);

}

function supprimerPassager() {
    //Ne peux pas supprimer un passager s'il n'y en a qu'un
    if (increment === 1)
        return;
    let dernierPassager = document.getElementById('passager'+separateur+increment);
    divPassagers.removeChild(dernierPassager);
    increment--;
    if(increment === 1) {
        boutonMoins.style.display = "none";
    }
}

function validerFormulaire() {
    let valeurPrenom = document.getElementById('valeurPrenom');
    validerNom();
    return false;
}

function validerNom() {

    let valeurNom = document.getElementById('valeurNom').value;

    if (!valeurNom || !contientUniquementLettres(valeurNom)) {

        afficherErreur("erreurNom", "Le nom doit contenir au moins deux lettres et pas de chiffres");
        return false;
    }

    return true;
}

function validerPrenom() {

    let valeurPrenom = document.getElementById('valeurPrenom').value;

    if (!valeurPrenom || !contientUniquementLettres(valeurPrenom)) {

        afficherErreur("erreurPrenom", "Le nom doit contenir au moins deux lettres et pas de chiffres");
        return false;
    }

    return true;
}

function contientUniquementLettres(texte) {
    var lettres = /^[A-Za-z]+$/;
    if(texte.value.match(lettres))
        return true;
    else
        return false;
}

function afficherErreur(idDuDiv, messageErreur) {

    document.getElementById(idDuDiv).style.display = "block";
    document.getElementById(idDuDiv).innerHTML = messageErreur;
}

function effacerErreur(idDuDiv) {

    document.getElementById(idDuDiv).style.display = "none";
}
