
//Simplement appeler "generer()" avec comme parametre le contenant qui va générer le QR code équivalent à la valeur.
//La valeur peut être feedée par PHP ou référé à une balise HTML contenant le code de l'image QR

//NOTEZ BIEN; ceci n'est qu'une esquisse de la génération du code QR, et sera probablement optimisée selon les réels besoins en temps et lieu
function generer(contenant, valeurQR)
{
    contenant.innerHTML = "<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + valeurQR.innerHTML + "'>";
}