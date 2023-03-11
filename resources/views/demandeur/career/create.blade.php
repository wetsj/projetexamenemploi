@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Parle nous de ton Objectif</h3>
                    <hr>
                    <form action="{{route('ca_store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <label for="">Objectif : </label>
                                    <textarea name="career_object" id="" cols="30" rows="5"  class="form-control @error('career_object') is-invalid @enderror" value="{{ old('career_object') }}"></textarea>
                                    @error('career_object')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6">
                                    <a href="{{route('certificate_index')}}" class="btn  btn-primary">Retour</a>
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
