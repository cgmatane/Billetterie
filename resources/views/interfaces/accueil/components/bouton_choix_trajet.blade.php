<div>
<a href="?idTrajet={{ $id }}" class="btn btn-outline-success mt-3 col-11">
    <div class="display-4" style="text-transform: uppercase">
        <p class="mt-1 mb-1">
            <em class="fas fa-map-marker-alt" style="color:blue"></em><span id="destination">{{ $destination }}</span>
            <em class="far fa-clock" style="color:tomato"></em><span id="heure"> {{ $heure }}</span>
        </p>
    </div>
</a>
    <div class="align-middle d-inline-block idInformation">
        <i class="fa fa-info-circle float-right fa-2x" style="color:blue"></i>
    </div>
</div>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal

    var idInformation =document.getElementsByClassName("idInformation")[i];
    idInformation.setAttribute("id", i);

    var btn = document.getElementById(i);
    console.log(i);

    i++;


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        console.log("wfuigwigwfuig");
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>