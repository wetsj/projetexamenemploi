@extends('layouts.accueil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Salut, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Parle nous de vous</h3>

                    <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Prenom: </label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Entrer votre prenom" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nom: </label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Entrer votre nom" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Profession : </label>
                                    <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" placeholder="Entrer votre profession" value ="{{old('profession')}}">
                                    @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email : </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre Email" value ="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tel : </label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Entrer votre numero de tel" value ="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Site Web : </label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Entrer votre site web" value ="{{old('website')}}">
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="">Addresse : </label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Entrer votre addresse" value ="{{old('address')}}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Code Postal : </label>
                                    <input type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" placeholder="Entrer votre code postal" value ="{{old('post_code')}}">
                                    @error('post_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Region : </label>
                                    <input type="text" class="form-control @error('division') is-invalid @enderror" name="division" placeholder="Entrer region" value ="{{old('division')}}">
                                    @error('division')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-6">
                                    <a href="{{route('main_index')}}" class="btn btn-info">Retour</a>
                                  
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="submit"class="btn btn-success" value="Continue">
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
