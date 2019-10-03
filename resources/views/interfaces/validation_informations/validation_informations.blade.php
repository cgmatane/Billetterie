@extends('interfaces.index')

@section('contenu')
<div class="container bg-white text-center shadow-lg mt-3" style="border-radius: 0.5em;">
    <div class="row">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-3" style="margin-top: auto;margin-bottom: auto;">
                    <h5>DATE</h5>
                </div>
                <div class="col-6">
                    <div class="container-fluid">
                        <div class="row col-6">
                            <h5>depart</h5>
                        </div>
                        <div class="row col-6">
                            <h5>arrivé</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3" style="margin-top: auto;margin-bottom: auto;">
                    <h5>prix</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid border border-secondary m-4" style="border-radius: 0.5em;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Passagers</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="{{ route('reservation_paiement') }}">
    <button type="button" class="btn btn-outline-success my-4 btn-block">
        VALIDER
    </button>
</a>
@endsection
