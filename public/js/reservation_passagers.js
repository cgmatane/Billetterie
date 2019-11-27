let increment;
let passagerVitrine;
let divPassagers;
let boutonMoins;
let separateur = '-';

document.addEventListener("DOMContentLoaded", onLoad);

var input;
var iti;

function onLoad() {
    input = document.querySelector("#valeurTelephone");
    iti = window.intlTelInput(input);
    increment = 0;
    passagerVitrine = document.getElementById('passager');
    divPassagers = document.getElementById('passagers');
    boutonMoins = document.getElementById('boutonRetirerPassager').parentElement;
    let checkboxMateriaux = document.getElementById('checkbox');
    let checkboxAnimaux = document.getElementById('checkbox2');
    checkboxMateriaux.onfocusin = (function() {
       this.parentNode.getElementsByTagName("svg")[0].style.stroke = 'green';
    });
    checkboxMateriaux.onblur = (function() {
        this.parentNode.getElementsByTagName("svg")[0].style.stroke = '#1b1e21';
    });
    checkboxAnimaux.onfocusin = (function() {
        this.parentNode.getElementsByTagName("svg")[0].style.stroke = 'green';
    });
    checkboxAnimaux.onblur = (function() {
        this.parentNode.getElementsByTagName("svg")[0].style.stroke = '#1b1e21';
    });
    ajouterPassager();

    let checkboxs = document.getElementsByClassName('check');
    for (let i = 0;i<checkboxs.length;i++) {
        checkboxs[i].onclick = function(evt) {
            evt.stopPropagation();
            checkboxs[i].parentNode.querySelector('input').checked = !checkboxs[i].parentNode.querySelector('input').checked;
        }
    }
}

function ajouterPassager() {
    increment++;
    if (increment === 2) {
        boutonMoins.style.display = "inline";
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
    let erreur = false;
    let passagers = document.getElementsByClassName("passager");
    let champ;
    //On commence a 1 pour skip le passager vitrine
    for (let i = 1;i<passagers.length;i++) {
        champ = passagers[i].getElementsByClassName('champNom')[0];
        if (!nomValide(champ)) {
            erreur = true;
        }

        champ = passagers[i].getElementsByClassName('champPrenom')[0];
        if (!nomValide(champ)) {
            erreur = true;
        }
    }
    champ = document.getElementById('champCourriel');
    if (!mailValide(champ)) {
        erreur = true;
    }
    else {
        setMessageErreurChamp(champ, false);
    }
    champ = document.getElementById('champTelephone');
    if (!telephoneValide(champ)) {
        erreur = true;
    }
    else {
        setMessageErreurChamp(champ, false);
    }
    champ = document.getElementById('champImmatriculation');
    if (champ) {
        if (!immatriculationValide(champ)) {
            erreur = true;
        }
        else {
            setMessageErreurChamp(champ, false);
        }
    }

    champ = document.getElementById('champMarqueVehicule');
    if (champ) {
        if (!nomValide(champ)) {
            erreur = true;
        }
    }

    champ = document.getElementById('champCouleurVehicule');
    if (champ) {
        if (!nomValide(champ)) {
            erreur = true;
        }
    }

    champ = document.getElementById('checkboxMatieres');
    if (!estChampValide(champ)) {
        erreur = true;
        setMessageErreurChamp(champ, true);
    }
    else {
        setMessageErreurChamp(champ);
    }
    champ = document.getElementById('checkboxAnimaux');
    if (!estChampValide(champ)) {
        erreur = true;
        setMessageErreurChamp(champ, true);
    }
    else {
        setMessageErreurChamp(champ, false);
    }

    if (!erreur) {
        let champTel = document.getElementById("valeurTelephone").value.substr(1);
        document.getElementById("valeurTelephone").value = "+" + iti.getSelectedCountryData().dialCode + champTel;
    }

    return !erreur;
}

function nomValide(champ) {

    input = champ.getElementsByTagName('input')[0];
    if(!(input.value.length > 0)) {

        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }
    if (!(/^[A-zÀ-ú\s]*$/.test(input.value))) {

        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }

    surlignerInput(input, false);
    setMessageErreurChamp(champ, false);
    return true;
}

function telephoneValide(champ) {

    input = champ.getElementsByTagName('input')[0];

    if (!(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(input.value))) {

        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }

    surlignerInput(input, false);
    setMessageErreurChamp(champ, false);
    return true;
}

function immatriculationValide(champ) {

    input = champ.getElementsByTagName('input')[0];

    if(input.value.length < 4 || input.value.length > 7) {

        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }

    if (!(/^[0-9A-Z\s]*$/.test(input.value))) {
        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }

    surlignerInput(input, false);
    setMessageErreurChamp(champ, false);
    return true;
}

function mailValide(champ) {

    input = champ.getElementsByTagName('input')[0];

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input.value))) {

        surlignerInput(input, true);
        setMessageErreurChamp(champ, true);
        return false;
    }

    surlignerInput(input, false);
    setMessageErreurChamp(champ, false);
    return true;
}

function estChampValide(champ) {
    input = champ.getElementsByTagName('input')[0];
    if (input.type === "checkbox") {
        valide = input.checked;
    }
    surlignerInput(input, !valide);
    return valide;
}

function surlignerInput(champ, erreur)
{
    if (champ.type === "checkbox") {
        if (erreur) {
            champ.parentNode.getElementsByTagName("svg")[0].style.stroke = '#f76';
        }
        else {
            champ.parentNode.getElementsByTagName("svg")[0].style.stroke = '#1b1e21';
        }
    }
    else {
        if (erreur) {
            champ.style.borderColor = '#fba';
        }
        else {
            champ.style.borderColor = 'transparent';
        }
    }
}

function setMessageErreurChamp(champ, afficher) {
    if (afficher) {
        champ.getElementsByClassName('champErreur')[0].style.display = "block";
    }
    else {
        champ.getElementsByClassName('champErreur')[0].style.display = "none";
    }
}
