window.onscroll = function() {myFunction()};

function myFunction() {
    var navSide = document.getElementsByClassName("nav-side-menu")[0];
    var x = document.body.scrollTop || document.documentElement.scrollTop;

    console.log(x);


    if (x < 55){
        navSide.style.top = (55-x)+"px" ;
    }else{
        navSide.style.top = "0" ;
    }
}
