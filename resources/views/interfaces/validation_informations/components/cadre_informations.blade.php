<div class="container bg-white {{--text-center--}} shadow-lg mt-3 p-1" style="border-radius: 0.5em;">
    <div class="m-1">
        <div class="container-fluid border text-justify border-secondary mt-4 mb-2" style="border-radius: 0.5em;">
            <h5 class="mt-2">{{ $validation_informations_traversee }}</h5>
            <div class="row">
                <div class="col">
                    {{ $validation_informations_date  }}
                </div>
                <div class="col">
                    {{ $date }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $validation_informations_depart  }}
                </div>
                <div class="col">
                    {{ $depart }}
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{ $validation_informations_heure_depart  }}
                </div>
                <div class="col">
                    {{ $heure }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $validation_informations_arrivee }}
                </div>
                <div class="col">
                    {{ $destination }}
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{ $validation_informations_prix  }}
                </div>
                <div class="col">
                    XXX {{ $validation_informations_dollar_canadien }}
                </div>
            </div>
            @isset($imageQR)
                <div class="text-right " style="padding-top: -120px">
                    <img src="{{$imageQR}}" height="20%" width="20%" class="border border-dark">
                </div>
            @endisset
        </div>
        <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
            <h5 class="mt-2">{{ $validation_informations_passagers }}</h5>
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
                        <td>{{ $ages[$i] }}</td>
                        <td>20.00 {{ $validation_informations_dollar_canadien }}</td> {{-- temporaire --}}
                    </tr>
                @endfor

                </tbody>

            </table>
        </div>
        @isset($type_vehicule)
            <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
                <h5 class="mt-2">{{ $validation_informations_vehicule }}</h5>
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
            </div>
        @endisset

        <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
            <h5 class="mt-2">{{ $validation_informations_vous_contacter }}</h5>
            <div class="row">
                <div class="col">{{ $validation_informations_courriel }}</div>
                <div class="col">{{ $email }}</div>
            </div>
            <div class="row">
                <div class="col">{{ $validation_informations_numero_telephone }}</div>
                <div class="col">{{ $numero }}</div>
            </div>
        </div>
    </div>
</div>
