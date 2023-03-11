@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Modifier le Certificat</h3>
                    <hr>
                    <form action="{{url('certificate_update/'.base64_encode($data->id))}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Nom Certificat : </label>
                                    <input type="text" class="form-control @error('certificate_name') is-invalid @enderror" name="certificate_name" value="{{ $data->certificate_name }}">
                                    @error('certificate_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">A propos : </label>
                                    <input type="text" class="form-control @error('about') is-invalid @enderror" name="about" placeholder=" saisir propos" value="{{ $data->about }}">
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Annee Certification : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Annee certification" value="{{ $data->year}}">
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6">
                                   <a href="{{route('certificate_index')}}" class="btn btn-primary">Retour</a>
                               </div>
                                <div class="col-md-6 text-right">
                                   <input type="submit" class="btn btn-success" value="Modifier">
                                    
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
