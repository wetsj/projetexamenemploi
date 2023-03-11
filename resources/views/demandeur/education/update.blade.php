@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Modifier Education Scolaire</h3>
                    <hr>
                    <form action="{{ url('update/'.base64_encode($data->id)) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Grade : </label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" placeholder="Entrer le grade" value="{{ $data->degree }}">
                                    @error('degree')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">Nom Etablissement : </label>
                                    <input type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" placeholder="Entrer le nom d'Etablissement" value="{{ $data->institute }}">
                                    @error('institute')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Annee Graduation : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Annee " value="{{ $data->year}}">
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('education_index')}}" class="btn btn-outline-info">Retour</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="submit" class="btn btn-outline-success" value="Modifier">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
