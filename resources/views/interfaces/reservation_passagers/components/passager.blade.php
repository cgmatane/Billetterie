<fieldset class="form-group passager" id = "passager-1" style = "border: #1b1e21 dashed thin;">
    <div class = "row p-0 m-2">
        <legend class = "legendePassager">Passager 1</legend>
        <input name="nom" type="text" class="form-control champNom col-sm-5" id="champNom-1" style="border-width:medium" placeholder="{{ $reservation_passagers_nom }}">
        <input name="prenom" type="text" class="form-control champPrenom col-sm-5" id="champPrenom-1" style="border-width:medium" placeholder="{{ $reservation_passagers_prenom }}">
        <select name="age" class="browser-default custom-select champAge col-sm-2" id="champAge-1">
            <option value="moins de 18 ans">moins de 18 ans</option>
            <option value="entre 18 et 60 ans" selected>entre 18 et 60 ans</option>
            <option value="plus de 60 ans">plus de 60 ans</option>
        </select>
    </div>
</fieldset>
