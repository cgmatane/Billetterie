var ajout_passagers = (function(){

    var increment;
    var form1;
    var form2;
    var form3;
    var bouton;
    var div;
    document.addEventListener("DOMContentLoaded", recevoirElements);
    

    function recevoirElements(){
        increment = 1;
        form1 = document.getElementById('premier-form-0');
        form2 = document.getElementById('deuxieme-form-0');
        form3 = document.getElementById('troisieme-form-0');
        div = document.getElementById('form-passager');
        boutonMoins = document.getElementById('bouton-moins');
        boutonPlus = document.getElementById('bouton-plus');
        
        boutonMoins.style.marginLeft = "85%";
        boutonPlus.style.marginLeft = "5px";
        
        //console.log("OK");
    }
    clonerForm =  function(){
        var form1Clone = form1.cloneNode(true);
        var form2Clone = form2.cloneNode(true);
        var form3Clone = form3.cloneNode(true);
       form1Clone.id = "premier-form-" + increment;
       form2Clone.id = "deuxieme-form-" + increment;
       form3Clone.id = "troisieme-form-" + increment;
       form1Clone.style.marginTop = "10px";
       form2Clone.style.marginTop = "10px";
       form3Clone.style.marginTop = "10px";
       increment++;
       
       div.appendChild(form1Clone);
       div.appendChild(form2Clone);
       div.appendChild(form3Clone);
       div.appendChild(boutonMoins);
       div.appendChild(boutonPlus);

   }

   supprimerForm = function(){
        console.log("increment:" + increment);
        increment--;
        var form1Delete = document.getElementById('premier-form-' + increment);
        var form2Delete = document.getElementById('deuxieme-form-' + increment);
        var form3Delete = document.getElementById('troisieme-form-' + increment);
        div.removeChild(form1Delete);
        div.removeChild(form2Delete);
        div.removeChild(form3Delete);
        console.log("increment:" + increment);
   }



})();