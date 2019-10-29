@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3; margin: 0">
    {{session('test')}}
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center p-4 m-4 font-weight-bold mb-5"
                        style="font-size: xx-large; color: midnightblue">
                        {{ $choix_deux_options_question }}
                    </h4>
                </div>
            </div>
            <div class="row text-center">
                <a href="?dernierChoix=1"
                   class="bg-white col-5 mx-auto p-5 shadow-lg oui"
                   style=" text-decoration:none; color: #1b1e21;font-size: xx-large; border-radius: 0.5em;"> <i class="{{ $choix_deux_options_icone1 }}" style="color:Green"></i>  {{ $choix_deux_options_choix1 }}</a>

                <a href="?dernierChoix=2"
                   class="bg-white col-5 mx-auto p-5 shadow-lg non"
                   style=" text-decoration:none; color: #1b1e21;font-size: xx-large; border-radius: 0.5em;"> <i class="{{ $choix_deux_options_icone2 }} " style="color:Tomato"></i> {{ $choix_deux_options_choix2 }}</a>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: -50px;">
            @component('global_components.zone_bas_de_page')
            @endcomponent
        </div>
    </div>

@endsection
