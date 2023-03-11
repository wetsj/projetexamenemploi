@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Parlons de ton education</h3>
                    <hr>
                    <form action="{{route('education_store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Grade: </label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" placeholder="Entrer le grade" value="{{ old('degree') }}">
                                    @error('degree')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">Nom Etablissement: </label>
                                    <input type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" placeholder="Entrer le nom de l'etablissement" value="{{ old('institute') }}">
                                    @error('institute')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Annee Graduation : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Annee Graduation" value="{{ old('year') }}">
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                   <input type="submit" class="btn btn-success" value="Continue">
                                    
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
