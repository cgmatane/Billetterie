<body id="top" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-warning font-weight-bold">Départ Matane <?php if (isset($_GET['jour'])) {echo $_GET['jour'] ; } else { echo '4' ; } ?> septembre</h1>
        </div>
    </div>
    <div class="text-center row justify-content-center">
        <div class="img-thumbnail col-sm-6 col-xs-8 bg-light pb-5">
        <h4 class="text-center mt-3">Choisissez votre destination/heure de départ</h4>
        <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success mt-5 col-6 p-3" >Godbout : 10h00</button></a><br>
            <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success mt-5 col-6 p-3" >Godbout : 13h30</button></a><br>
            <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success mt-5 col-6 p-3" >Godbout : 16h00</button></a><br>
            <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success col-6 mt-5 p-3" >Baie-Comeau : 10h45</button></a>
            <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success col-6 mt-5 p-3" >Baie-Comeau : 13h00</button></a>
            <a href="index.php?page=reservation_choix_vehicule"><button type="button" class="btn btn-success col-6 mt-5 p-3" >Baie-Comeau : 15h30</button></a>
        </div>
    </div>
    <div class="row text-center justify-content-around">
        <a href="index.php?page=choix_date"><button type="button" class="btn btn-info mt-5 p-3 mb-5" >Choisir une autre date</button></a>
        <a href="index.php?page=choix_depart"><button type="button" class="btn btn-info mt-5 p-3 mb-5" >Choisir un autre départ</button></a>
    </div>
</div>