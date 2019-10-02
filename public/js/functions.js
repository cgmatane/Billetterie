

function verifNom(champ, id_alert, text_alert){
    if(!champ.value.match(/^[a-zA-Z -]{1,100}$/) || champ.value.substr(0,1)==" "){
        document.getElementById(id_alert).innerHTML = text_alert;
        document.getElementById(champ.id).style.borderColor = "#dc3545";
    }else{
        document.getElementById(id_alert).innerHTML = "";
        document.getElementById(champ.id).style.borderColor = "#28a745";
    }
}
function verifMail(champ, id_alert, text_alert){
    if(!champ.value.match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
        document.getElementById(id_alert).innerHTML = text_alert;
        document.getElementById(champ.id).style.borderColor = "#dc3545";
    }else{
        document.getElementById(id_alert).innerHTML = "";
        document.getElementById(champ.id).style.borderColor = "#28a745";
    }
}
function verifMDP(champ, id_alert, text_alert){
    if(champ.value.length < 8){
        document.getElementById(id_alert).innerHTML = text_alert;
        document.getElementById(champ.id).style.borderColor = "#dc3545";
    }else{
        document.getElementById(id_alert).innerHTML = "";
        document.getElementById(champ.id).style.borderColor = "#28a745";
    }
}
function verifConfirmationMDP(champ,id_champ_ref, id_alert, text_alert){
    var mdp_ref = document.getElementById(id_champ_ref).value;
    if(champ.value != mdp_ref){
        console.log(champ+ ' -- ' + mdp_ref);
        document.getElementById(id_alert).innerHTML = text_alert;
        document.getElementById(champ.id).style.borderColor = "#dc3545";
    }else{
        document.getElementById(id_alert).innerHTML = "";
        document.getElementById(champ.id).style.borderColor = "#28a745";
    }
}





