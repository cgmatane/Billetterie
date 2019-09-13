# Laravel HELP


<h2>----------------INTRODUCTION--------------------<h2>

Documentation par Benjamin (pour toute question notifiez-moi sur Discord ! Je suis (presque) toujours connecté :) )
Pour éditer ce .md, ouvrez-le via drive avec ShiftEdit

Tutoriel vidéo : https://www.youtube.com/watch?v=mISRTGYtWVs&list=PLriKzYyLb28mtqooR44LgfSxwJb6eJnUi (C'est en anglais mais il parle très lentement et articule beaucoup donc vous ne devriez pas avoir de problème de compréhension :) )
          Tout est interéssant à regarder mis à part les 2 dernières vidéos de la playlist, où il parle d'un framework CSS autre que Bootstrap.
          Il y a plusieurs tutoriels mais je vous conseille les tutoriels vidéos qui sont plus ludiques et facile à suivre selon moi (avis personnel)
          
          
<h2>----------------À LIRE ABSOLUMENT POUR L'INSTALLATION DU PROJET--------------------<h2>


Le projet Laravel se trouve sur le github sous le repository "Billeterie"
ATTENTION !! Quand vous téléchargerez le projet Laravel avec la commande git clone, il manquera certains fichiers pour votre projet, qui sont labellés du .gitignore et ne se 
retrouve donc pas sur le remote repository. Je vous conseille de créer vous même de créer un projet Laravel avec la commande correspondante, puis de faire "git clone" dans 
le dossier, de sorte à remplacer tous les fichiers en commun et de bien avoir tous les fichiers du gitignore.

-Quand vous avez fait tout ça, runnez la commande "npm install" à la racine du projet, ça va installer toutes les librairies dont on a besoin. Pour pouvoir exécuter cette commande, vous devez 
d'abord avoir installé Node.js sur votre PC (https://nodejs.org/en/download/). Soyez bien sûr que le dossier node_modules se trouve bien dans le .gitignore.
  
  

**-/ !!!IMPORTANT !!!\Quand vous aurez configuré votre IDE sur le projet (à priori PHP Storm, une version étudiante est disponible), soyez bien sûr d'ajouter dossier d'IDE (.idea si PHP Storm) dans les dossiers à ignorer du gitignore.**

<h2>----------------LOCALISATION DE QUELQUES DOSSIERS IMPORTANTS--------------------<h2>


À partir de la racine du projet :
  Les vues sont stockés dans /resources/views
    Note : On ne crée pas d'objet pour une vue comme le prof a dit, Laravel a son propre système de template blade qui nous permet de moduler directement des pages HTML
  Les modèles sont stockés dans /app  (ne cherchez pas un dossier model)
    Note : Pas besoin de coder un DAO pour chaque objet, Laravel prend directement en charge tout ça. Il n'y a pas non plus besoin d'écrire les attributs de chaque modèle, 
          Laravel a juste besoin de savoir à quel table se réfère l'objet
  Les controlleurs sont stockés dans /app/Http/Controllers
    Note : On crée un unique controlleur car on fait une application centralisée
  
  On trouve les routes dans /routes/web.php
  
  Le fichier index.php se trouve dans /public, mais on n'y touche pas <!>
  
  
  
  IMPORTANT : le fichier .env (n'oubliez pas d'activer "afficher les fichiers cachés" si ce n'est pas déjà fait) contient toutes les informations permettant de se connecter
  à une base de données (identifiant, mdp, nom de la SGBD et nom de la base de données). Le framework pioche les valeurs des constantes dans ce fichier pour se connecter à la base de données.
 
 
<h2>----------------PHP ARTISAN--------------------<h2>
  
PHP artisan permet d'utiliser un ensemble de commandes utiles pour l'édition du projet (Bien sûr, vous devez avoir défini le chemin vers php.exe dans PATH :-) )
  -Avec une invite de commande, allez à la racine du projet
  -Tapez "php artisan" -> affiche la liste des commandes
  Exemple : "php artisan make:controller ControllerTest" crée un fichier controller incluant le corps de classe de nom ControllerTest
  Pour lancer le serveur : "php artisan serve" (par défaut sur le port 8000) on y accède en tapant "localhost:8000" sur la barre du navigateur