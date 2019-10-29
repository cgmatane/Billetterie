<div style="width: 100% ;height: 300px; background-color: midnightblue; border-radius: 20px">
    <div class="row col-sm-12">
        <div class="col" id="zoneDeGauche">
            @component('global_components.bouton_retour_precedent')
                {{ $global_retour_choix_precedent ?? 'Retour'}}
            @endcomponent
        </div>
        <div class="col" id="zoneDeDroite">
            @component('global_components.bouton_recommencer')
                {{ $global_retour_au_debut ?? 'Recommencer'}}
            @endcomponent
        </div>
    </div>
</div>


<!-- /!\ PROVISOIRE  -->
<style>
    @media screen and (min-width: 768px) {
        #zoneDeDroite {
            loat: right;
            margin-right: 3%;
            margin-top: 200px
        }

        #zoneDeGauche {
            float: left;
            margin-left: 5%;
            margin-top: 200px;
        }

        #boutonRecommencer {
            float: right;
        }
    }

    @media screen and (max-width: 768px) {
        #zoneDeDroite {
            margin-top: 80px;
            display: inline-block;
            float: left;
        }
        #zoneDeGauche {
            margin-top: 80px;
            display: inline-block;
            float: left;
        }
        #boutonRecommencer {
            float: left;
        }
    }
</style>
