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
        bouton = document.getElementById('bouton-plus');
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
       div.appendChild(bouton);

   }



})();