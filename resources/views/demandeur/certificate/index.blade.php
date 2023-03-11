@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info" style="display:inline-block">Resume de ton travail</h3>
                    <div class="text-right" style="display:inline-block;float:right">
                        <a href="{{route('certificate_create')}}" class="btn btn-outline-success">Ajouter</a>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom Certificat</th>
                                <th scope="col">A propos</th>
                                <th scope="col">Annee</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                      <tbody>
                          @php
                          $i=1
                          @endphp
                           @foreach ($data as $d)
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                <td>{{ $d->certificate_name}}</td>
                                <td>{{ $d->about}}</td>
                                <td>{{ $d->year}}</td>
                                <td>
                                    <a href="{{ url('certificate_update/'.base64_encode($d->id)) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                                    <a href="{{ url('delete/'.base64_encode($d->id)) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Etes-vous sur ?')">Supprimer</a>
                                   
                                </td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <a href="{{route('ca_create')}}" class="btn btn-block btn-success">Prochain</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <a href="{{route('work_index')}}" class="btn btn-block btn-primary">Retour Experiences</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
