<div class="container bg-white shadow-lg mt-3 p-5" style="border-radius: 0.5em;">
    <div class="m-1">
        <div class="container-fluid border text-justify border-secondary mt-4 mb-2 pb-2" style="border-radius: 0.5em;">
            <h2 class="mt-2 h4">{{ $validation_informations_traversee }}</h2>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_depart }}
                    </div>
                    <div class="col">
                        {{ $depart }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_arrivee }}
                    </div>
                    <div class="col">
                        {{ $arrivee }}
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        {{ $validation_informations_date_depart }}
                    </div>
                    <div class="col">
                        {{ $date_depart }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_date_arrivee }}
                    </div>
                    <div class="col">
                        {{ $date_arrivee }}
                    </div>
                </div>

            <div class="row">
                <div class="col">
                    {{ $validation_informations_prix }}
                </div>
                <div class="col">
                    {{ $prix }} {{ $validation_informations_dollar_canadien }}
                </div>
            </div>
            @isset($imageQR)
                <div class="text-right " style="padding-top: -120px">
                    <img src="{{$imageQR}}" height="20%" width="20%" class="border border-dark">
                </div>
            @endisset
        </div>
        <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
            <h2 class="mt-2 h4">{{ $validation_informations_passagers }}</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{ $validation_informations_nom }}</th>
                    <th scope="col">{{ $validation_informations_prenom }}</th>
                    <th scope="col">{{ $validation_informations_age }}</th>
                    <th scope="col">{{ $validation_informations_tarif }}</th>
                </tr>
                </thead>
                <tbody>


                @for($i = 0;$i<count($noms);$i++)
                    <tr>
                        <td>{{ $noms[$i] }}</td>
                        <td>{{ $prenoms[$i] }}</td>
                        <td>
                            @if ($ages[$i]['age_min'] <= 0)
                                {{ $validation_informations_moins_de }} {{ $ages[$i]['age_max'] + 1 }} {{ $validation_informations_ans }}
                            @elseif ($ages[$i]['age_max'] >= 500)
                                {{ $validation_informations_plus_de }} {{ $ages[$i]['age_min'] - 1 }} {{ $validation_informations_ans }}
                            @else
                                {{ $validation_informations_entre }} {{ $ages[$i]['age_min'] }} {{ $validation_informations_et }} {{ $ages[$i]['age_max'] }} {{ $validation_informations_ans }}
                            @endif
                            </td>
                        <td>{{ $tarifs_passagers[$i] }} {{ $validation_informations_dollar_canadien }}</td>
                    </tr>
                @endfor

                </tbody>

            </table>
        </div>
        @isset($type_vehicule)
            <div class="container-fluid border border-secondary mb-2 pb-2" style="border-radius: 0.5em;">
                <h2 class="mt-2 h4">{{ $validation_informations_vehicule }}</h2>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_vehicule_soute }}
                    </div>
                    <div class="col">
                        {{ $type_vehicule }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_charge_lourde }}
                    </div>
                    <div class="col">
                        @if($poids_eleve)
                            {{ $validation_informations_oui }}
                        @else
                            {{ $validation_informations_non }}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_immatriculation }}
                    </div>
                    <div class="col">
                        {{ $immatriculation }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ $validation_informations_tarif }}
                    </div>
                    <div class="col">
                        {{ $tarif_vehicule }}
                    </div>
                </div>
            </div>
        @endisset

        <div class="container-fluid border border-secondary mb-2 pb-2" style="border-radius: 0.5em;">
            <h2 class="mt-2 h4">{{ $validation_informations_vous_contacter }}</h2>
            <div class="row">
                <div class="col">{{ $validation_informations_courriel }}</div>
                <div class="col">{{ $mail }}</div>
            </div>
            <div class="row">
                <div class="col">{{ $validation_informations_numero_telephone }}</div>
                <div class="col">{{ $numero }}</div>
            </div>
        </div>
    </div>
</div>
