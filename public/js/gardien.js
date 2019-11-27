var dernierScan = null;


(function initier(){
    window.setTimeout(rafraichir, 5000);
})();


function rafraichir(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'http://localhost:8000/requete-qr?qr=scan', true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if(qrcode != this.responseText){
                location.reload();
            }
            window.setTimeout(rafraichir, 4000);
        }
    }
}