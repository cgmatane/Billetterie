<div style="width: 100% ;height: 300px; background-color: midnightblue; border-radius: 20px; pointer-events: none;">
    <div class="row col-sm-12">
        <div class="col" id="zoneDeGauche">
            @component('global_components.bouton_retour_precedent')
                {{ $global_retour_choix_precedent }}
            @endcomponent
        </div>
        <div class="col" id="zoneDeDroite">
            @component('global_components.bouton_recommencer')
                {{ $global_retour_au_debut }}
            @endcomponent
        </div>
    </div>
</div>
