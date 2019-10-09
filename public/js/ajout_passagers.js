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
        boutonMoins = document.getElementById('bouton-moins');
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
        clonePassager.getElementsByClassName('champPrenom')[0].id += separateur + increment;
        clonePassager.getElementsByClassName('champAge')[0].id += separateur + increment;
        clonePassager.style.display = "block";

        divPassagers.appendChild(clonePassager);

    }

    function supprimerPassager() {
        //Ne peux pas supprimer un passager s'il n'y en a qu'un
        if (increment === 1)
            return;
        let dernierPassager = document.getElementById('passager-'+increment);
        divPassagers.removeChild(dernierPassager);
        increment--;
        if(increment === 1) {
            boutonMoins.style.display = "none";
        }
    }

    function validerFormulaire() {
        let erreur = false;
        let passagers = document.getElementsByClassName("passager");
        for (let i = 0;i<passagers.length;i++) {
            if (!estChampValide(passagers[i].getElementsByClassName('champNom')[0])) {
                erreur = true;
            }
            if (!estChampValide(passagers[i].getElementsByClassName('champPrenom')[0])) {
                erreur = true;
            }
        }

        if (!estChampValide(document.getElementById('champCourriel'))) {
            erreur = true;
        }

        if (!estChampValide(document.getElementById('champTelephone'))) {
            erreur = true;
        }

        return !erreur;
    }

    function estChampValide(champ) {
        valide = champ.value.length > 0;
        surligne(champ, !valide);
        return valide;
    }

    function surligne(champ, erreur)
    {
        let couleur;
        if (erreur) {
            couleur = '#fba';
        }
        else {
            couleur = 'transparent';
        }
        champ.style.borderColor = couleur;
    }

