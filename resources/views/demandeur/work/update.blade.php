@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Modifier Experience Professionnelle</h3>
                    <hr>
                    <form action="{{url('work_update/'.base64_encode($data->id))}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Nom Societe : </label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Entrer le nom de la societe" value="{{ $data->company_name }}">
                                    @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">Poste : </label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" placeholder="Entrer le poste " value="{{ $data->position }}">
                                    @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Annee : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Annee" value="{{ $data->year}}">
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
