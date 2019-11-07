
@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3">
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h1 class="text-center font-weight-bold" style="color: midnightblue">
                    {{ $informations_titre }}
                </h1>
            </div>
        </div >
        <div class="text-center row justify-content-center mb-5">
            <div class="bg-white rounded col-sm-6 col-xs-8 bg-light pt-2 pb-5">
                {!! $informations_contenu !!}
            </div>
            <div class="container-fluid" id="footerChoixMultiples">
                <div style="width: 100% ;height: 300px; background-color: midnightblue; border-radius: 20px">
                    <div class="row col-sm-12">
                        <div class="col" id="zoneDeGauche">
                            @component('global_components.bouton_retour_precedent')
                                Retour
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
