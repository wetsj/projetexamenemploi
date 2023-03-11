@extends('layouts.accueil')

@section('content')


<br>
@if(session('status'))
    <h6 class="alert alert-danger">{{session('status')}}</h6>
@endif
<br>
&nbsp;
@foreach ($poste as $pos)
                
<div class="card" style="width: 19.5rem; display:inline-flex; height: 360px;">
    <div class="row row-cols-3">
        <div class="card-body">
            
            <p class="card-text"><strong>Poste</strong> : {{ $pos->poste }}</p>
            <p class="card-text"><strong>Prerequis</strong> : {{ $pos->prerequis }}</p>
            <p class="card-text"><strong>Salaire</strong> : {{ $pos->salaire }} CFA</p>
            <p class="card-text"><strong>Pays</strong> : {{ $pos->pays }}</p>
            <p class="card-text"><strong>Contrat</strong> : {{ $pos->contrat }}</p>

            <?php
                if($pos->user_id == auth()->user()->id){
            ?>
                <a href="{{ url('edit-poste/'.$pos->id) }}" class="btn btn-warning">Modifier</a>
                <a href="{{ url('delete-poste/'.$pos->id) }}" class="btn btn-danger">Supprimer</a>
            <?php } ?>

            <?php
                if(auth()->user()->type == "demandeur"){
            ?>
                <a href="" class="btn btn-secondary">Postuler</a>
            <?php } ?>
        </div>
    </div>
</div>

@endforeach
 
@endsection
