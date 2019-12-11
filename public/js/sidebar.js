window.onscroll = function() {myFunction()};

function myFunction() {
    var navSide = document.getElementsByClassName("nav-side-menu")[0];
    var titreSide = document.getElementsByClassName("titre-side")[0];
    var x = document.body.scrollTop || document.documentElement.scrollTop;



    if (x < 55){
        navSide.style.top = (55-x)+"px" ;
        titreSide.style.marginBottom = "calc(4em - "+x+"px)";
    }else{
        navSide.style.top = "0" ;
        titreSide.style.marginBottom = "0";
    }
}
