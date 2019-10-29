let entrees = [];
let colonnes = [];
let clesEtrangeres = [];

(function init() {
    setColonnes();
    setClesEtrangeres();
    setEntrees();
    supprimerContenuCache();
    document.querySelector('table').querySelector('tbody').innerHTML = getHTMLDeEntrees();
})();

function setEntrees() {
    entrees = [];
    let DOMEntrees = document.getElementById('entrees').children;
    for (let i = 0;i<DOMEntrees.length;i++) {
        let id = DOMEntrees[i].querySelector('.id-entree').innerHTML;
        entrees[id] = [];
        let DOMValeurs = DOMEntrees[i].querySelector('.valeurs').children;
        for (let j = 0;j<DOMValeurs.length;j++) {
            entrees[id].push(DOMValeurs[j].innerHTML);
        }
    }
}

function getHTMLDeEntrees() {
    HTML = '';
    for (let id in entrees) {
        HTML += '<tr>';
        HTML += '<td>' + id + '</td>';
        for (let i=0;i<entrees[id].length;i++) {
            let valeurEntrante = entrees[id][i];
            let valeurSortante = '';
            let type = colonnes[i+1]['type'];

            switch (type[0]) {
                case 'bool':
                    if (valeurEntrante === '1')
                        valeurSortante = '<i class="fa fa-check"></i>';
                    else
                        valeurSortante = '<i class="fas fa-times"></i>';
                    break;
                case 'cle':
                    valeurSortante = getNomCleEtrangerePourIdEtNomTable(valeurEntrante, type[1]);
                    break;
                default:
                    valeurSortante = valeurEntrante;
            }
            HTML += '<td>' + valeurSortante + '</td>';
        }
        HTML += '<td>';
        HTML += '<a data-target="#myModal1" data-toggle="modal" onclick="remplirModalAjoutEdition('+id+')"><i class="fas fa-edit mr-3"></i></a>';
        HTML += '<a data-target="#myModal" data-toggle="modal" onclick="remplirModalSuppression('+id+')"><i class="fas fa-trash-alt"></i></a>';
        HTML += '</td></tr>';
    }
    return HTML;
}

function setColonnes() {
    colonnes = [];
    let DOMColonnes = document.getElementById('colonnes').children;
    for (let i = 0;i<DOMColonnes.length;i++) {
        let colonne = [];
        colonne['attribut'] = DOMColonnes[i].querySelector('.attribut-colonne').innerHTML;
        colonne['nom'] = DOMColonnes[i].querySelector('.nom-colonne').innerHTML;
        colonne['type'] = DOMColonnes[i].querySelector('.type-colonne').innerHTML.split('|');
        colonnes.push(colonne);
    }
}

function setClesEtrangeres() {
    clesEtrangeres = [];
    let DOMClesEtrangeres = document.getElementById('cles-etrangeres').children;
    for (let i = 0;i<DOMClesEtrangeres.length;i++) {
        let nomTable = DOMClesEtrangeres[i].querySelector('.nom-table').innerHTML;
        clesEtrangeres[nomTable] = [];

        clesEtrangeres[nomTable]['attributs_lies'] = [];

        let attributsLies = DOMClesEtrangeres[i].querySelector('.attributs-lies').children;
        for (let j = 0;j<attributsLies.length;j++) {
            clesEtrangeres[nomTable]['attributs_lies'].push(attributsLies[j].innerHTML);
        }

        clesEtrangeres[nomTable]['ids'] = [];
        let DOMCleEtrangerePourTable = DOMClesEtrangeres[i].querySelector('.cles-etrangeres').children;
        for (let j = 0;j<DOMCleEtrangerePourTable.length;j++) {
            let id = DOMCleEtrangerePourTable[j].querySelector('.cle-etrangere-id').innerHTML;
            clesEtrangeres[nomTable]['ids'][id] = DOMCleEtrangerePourTable[j].querySelector('.cle-etrangere-nom').innerHTML;
        }
    }
}

function supprimerContenuCache() {
    DOMContenuCache = document.getElementById('donnees-masquees');
    DOMContenuCache.parentNode.removeChild(DOMContenuCache);
}

function remplirModalAjoutEdition(id = -1) {
    DOMFormulaire = document.getElementById('myModal1').querySelector('form').querySelector('.modal-body');
    DOMFormulaire.innerHTML =getHTMLFormulaireAjouterEditerEntree(id);
}

function remplirModalSuppression(id) {
    document.getElementById("supprimer-id").value = id;
    document.getElementById("supprimer-texte").innerHTML = "Champ : #"+id;
}

function getHTMLFormulaireAjouterEditerEntree(id) {
    let entree;

    HTML = '';
    if (id > -1) {
        entree = entrees[id];
    }
    HTML += '<input type="hidden" name="edition" value="'+((id > -1)?'1':'0')+'">';
    HTML += '<input type="hidden" name="'+colonnes[0]['attribut']+'" value="'+id+'">';
    for (let i = 1;i<colonnes.length;i++) {
        HTML += '<div class="form-group">';
        HTML+= '<label for="' + colonnes[i]['attribut'] + '">' + colonnes[i]['nom'] + '</label>';
        let type = colonnes[i]['type'];
        switch (type[0]) {
            case 'cle':
                idSelectionne = (id > -1)?entree[i-1]:-1;
                HTML += getHTMLDeClesEtrangeresPourTable(type[1], colonnes[i]['attribut'],idSelectionne);
                break;
            case 'text':
                HTML += '<input type="text" name="'+colonnes[i]['attribut']+'" value="'+((id>-1)?entree[i-1]:'')+'" placeholder="'+colonnes[i]['nom']+'"'+'>';
                break;
            case 'bool':
                HTML += '<input type="checkbox" name="'+colonnes[i]['attribut']+'"'+((id>-1 && entree[i-1] === '1')?' checked':'')+ '>';
                break;
            default:
                HTML += '<input type="'+type[0]+'" name="'+colonnes[i]['attribut']+'" value="'+((id>-1)?entree[i-1]:'')+'">';
        }
        HTML += '</div>';
    }
    return HTML;
}

function getHTMLDeClesEtrangeresPourTable(nomTable, attributLie, idCleSelectionne = -1) {
    HTML = '<select name="'+nomTable+'|'+attributLie+'">';

    for (let id in clesEtrangeres[nomTable]['ids']) {
        HTML += '<option value="'+id+'"'+((idCleSelectionne === parseInt(id))?' selected':'')+'>' + clesEtrangeres[nomTable]['ids'][id] + '</option>';
    }
    HTML += '</select>';
    return HTML;
}

function getNomCleEtrangerePourIdEtNomTable(idCleEtrangere,nomTable) {
    return clesEtrangeres[nomTable]['ids'][idCleEtrangere];
}
