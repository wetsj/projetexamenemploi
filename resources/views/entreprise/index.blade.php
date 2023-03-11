@extends('layouts.accueil')

@section('content')
<br>
@if(session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif
<br>
&nbsp;
@foreach ($poste as $pos)
<?php
    if($pos->user_id == auth()->user()->id){
?>

<div class="card" style="width: 19.5rem; display:inline-flex;">
    <div class="row row-cols-3">
        <div class="card-body">

            <p class="card-text"><strong>Nom Entreprise</strong> : 
                @if($pos->user_id == auth()->user()->id)
                    {{ auth()->user()->name }}
                @endif
            </p>
            <p class="card-text"><strong>Poste</strong> : {{ $pos->poste }}</p>
            <p class="card-text"><strong>Prerequis</strong> : {{ $pos->prerequis }}</p>
            <p class="card-text"><strong>Salaire</strong> : {{ $pos->salaire }} CFA</p>
            <p class="card-text"><strong>Pays</strong> : {{ $pos->pays }}</p>
            <p class="card-text"><strong>Contrat</strong> : {{ $pos->contrat }}</p>
            <a href="{{ url('edit-poste/'.$pos->id) }}" class="btn btn-warning">Modifier</a>
            <a href="{{ url('delete-poste/'.$pos->id) }}" class="btn btn-danger">Supprimer</a>

        </div>
    </div>
</div>

<?php } ?>

@endforeach
 
@endsection
