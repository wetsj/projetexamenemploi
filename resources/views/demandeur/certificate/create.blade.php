@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Parle nous de ton certificat</h3>
                    <hr>
                    <form action="{{route('certificate_store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Nom du certificat : </label>
                                    <input type="text" class="form-control @error('certificate_name') is-invalid @enderror" name="certificate_name" placeholder="Entrer le nom du certificat" value="{{ old('certificate_name') }}">
                                    @error('certificate_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">A propos : </label>
                                    <input type="text" class="form-control @error('about') is-invalid @enderror" name="about" placeholder="A propos du certificat" value="{{ old('about') }}">
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Annee du certificat : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Annee certificat" value="{{ old('year') }}">
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6">
                                   <a href="{{route('work_index')}}" class="btn btn-primary">Retour</a>
                               </div>
                                <div class="col-md-6 text-right">
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
