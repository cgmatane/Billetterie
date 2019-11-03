progressBars = document.getElementsByClassName("progress-bar");
[].forEach.call( progressBars, function(progressBar) {
    var nombre = progressBar.getAttribute('data-nombre');
    var total = progressBar.getAttribute('data-total');
    progressBar.innerHTML = nombre+"/"+total;
    var width = (nombre/total) * 100;
    progressBar.style.width = ""+width+"%";
    if(width<50 || width>100){
        progressBar.style.color = "red";
    }
});
