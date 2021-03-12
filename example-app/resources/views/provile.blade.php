@extends('layouts.app')

@section('title', 'Профиль' )
@section('content')
<h2>Профиль {{ Auth::user()->name }}</h2>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif
<div class="container-fluid">
<label class="mt-4" for="image_forum">Фото профиля</label>
<img class="img-thumbnail border-0 mt-1 ml-1" style="width: 90px; height: 85px; border-radius: 100px; box-shadow: 0 0 5px #666" src="{{ asset('/storage/' .Auth::user()->avatar)}}">
<p>Почта:</p>
<h4 class="text-break ml-1">
    {{Auth::user()->email}}
</h4>
<p>{{Auth::user()->created_at}}</p>
<a href="{{ route('editProvile', Auth::user()->name) }}">
<button type="submit" class="btn btn-succes">
    {{ __('Редактировать профиль') }}
</button>
</a>
</div>
<form method="POST" action="{{ url('logout-others') }}">
    @csrf
    <div class="form-group">
        <label for="password" class="col-md-4 col-form-label text-mb-left">{{ __('Пароль') }}</label>
 
        <div class="col-md-4">
            <input class="form-control" id="password" type="password" name="password" required>
        </div>
    </div>
    <div class="form-group mb-0">
 
        <div class="col-md-6 offset">
            <button type="submit" class="btn btn-primary">
                {{ __('Выйти на других устройствах') }}
            </button>
        </div>
    </div>
</form>

    <form method="POST" action="{{ route('logout-self') }}">
        @csrf
        <div class="form-group">     
            <div class="col-md-6 offset mt-1">
                <button type="submit" class="btn btn-primary">
                    {{ __('Выйти из аккаунта') }}
                </button>
            </div>
        </div>
    </form>
@endsection