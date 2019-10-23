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
        let erreur = false;
        let passagers = document.getElementsByClassName("passager");
        let champ;
        //On commence a 1 pour skip le passager vitrine
        for (let i = 1;i<passagers.length;i++) {
            champ = passagers[i].getElementsByClassName('champNom')[0];
            if (!estChampValide(champ)) {
                erreur = true;
                setMessageErreurChamp(champ, 'Veuillez saisir un nom');
            }
            else {
                setMessageErreurChamp(champ);
            }
            champ = passagers[i].getElementsByClassName('champPrenom')[0];
            if (!estChampValide(champ)) {
                erreur = true;
                setMessageErreurChamp(champ, 'Veuillez saisir un prénom');
            }
            else {
                setMessageErreurChamp(champ);
            }
        }
        champ = document.getElementById('champCourriel');
        if (!estChampValide(champ)) {
            erreur = true;
            setMessageErreurChamp(champ, 'Veuillez saisir un courriel');
        }
        else {
            setMessageErreurChamp(champ);
        }
        champ = document.getElementById('champTelephone');
        if (!estChampValide(champ)) {
            erreur = true;
            setMessageErreurChamp(champ, 'Veuillez saisir un numéro de téléphone');
        }
        else {
            setMessageErreurChamp(champ);
        }
        champ = document.getElementById('checkboxMatieres');
        if (!estChampValide(champ)) {
            erreur = true;
            setMessageErreurChamp(champ, 'Vous devez confirmer que vous ne transportez pas de matériaux dangereux pour continuer');
        }
        else {
            setMessageErreurChamp(champ);
        }
        champ = document.getElementById('checkboxAnimaux');
        if (!estChampValide(champ)) {
            erreur = true;
            setMessageErreurChamp(champ, 'Vous devez confirmer que vous ne voyagez pas avec des animaux exotiques pour continuer');
        }
        else {
            setMessageErreurChamp(champ);
        }

        return !erreur;
    }

    function estChampValide(champ) {
        input = champ.getElementsByTagName('input')[0];
        if (input.type === "checkbox") {
            valide = input.checked;
        }
        else {
            valide = input.value.length > 0;
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

    function setMessageErreurChamp(champ, messageErreur = null) {
        if (messageErreur == null) {
            champ.getElementsByClassName('champErreur')[0].style.display = "none";
            champ.getElementsByClassName('texteErreur')[0].innerHTML = '';
            return;
        }
        champ.getElementsByClassName('champErreur')[0].style.display = "block";
        champ.getElementsByClassName('texteErreur')[0].innerHTML = messageErreur;
    }
