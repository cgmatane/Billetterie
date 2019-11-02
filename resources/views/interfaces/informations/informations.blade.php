
@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3">
    <div class="container">
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
        </div>
    </div>
@endsection
