


function remplirModalInfos(provenance) {
    let contenuModal = document.getElementById('modal-infos').querySelector('.modal-body');
    let infos = provenance.querySelector('.infos-caches');
    contenuModal.querySelector('.urgent').querySelector('.donnees').innerHTML = infos.querySelector('.urgent').innerHTML;
    contenuModal.querySelector('.date-arrivee').querySelector('.donnees').innerHTML = infos.querySelector('.date-arrivee').innerHTML;
    contenuModal.querySelector('.heure-arrivee').querySelector('.donnees').innerHTML = infos.querySelector('.heure-arrivee').innerHTML;
    contenuModal.querySelector('.navire').querySelector('.donnees').innerHTML = infos.querySelector('.navire').innerHTML;
    contenuModal.querySelector('.nombre-places-restantes-passagers').querySelector('.donnees').innerHTML = infos.querySelector('.nombre-places-restantes-passagers').innerHTML;
    contenuModal.querySelector('.nombre-places-restantes-vehicules').querySelector('.donnees').innerHTML = infos.querySelector('.nombre-places-restantes-vehicules').innerHTML;

}

/*let modal = document.getElementById("myModal");
let idInformation =document.getElementsByClassName("idInformation")[i];
idInformation.setAttribute("id", i);
let btn = document.getElementById(i);
console.log(i);
i++;
let span = document.getElementsByClassName("close2")[0];
btn.onclick = function() {
    console.log("wfuigwigwfuig");
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
modal.onclick = function(event) {
    modal.style.display = "none";
}*/