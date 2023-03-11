@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info" style="display:inline-block">Ton Education Scolaire</h3>
                    <div class="text-right" style="display:inline-block;float:right">
                        <a href="{{route('education_create')}}" class="btn btn-outline-success">Ajouter</a>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Institut</th>
                                <th scope="col">Annee</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                          $i=1
                          @endphp
                           @foreach ($data as $d)
                            <tr>
                                <th scope="row">{{ $i++}}</th>
                                <td>{{ $d->degree}}</td>
                                <td>{{ $d->institute}}</td>
                                <td>{{ $d->year}}</td>
                                <td>
                                    <a href="{{ url('update/'.base64_encode($d->id)) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                                    <a href="{{ url('edu_delete/'.base64_encode($d->id)) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Etes-vous sur ?')">Supprimer</a>
                                   
                                </td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <a href="{{ route('work_create')}}" class="btn btn-block btn-success">Prochain</a>
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
