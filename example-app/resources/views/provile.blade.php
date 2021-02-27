@extends('layouts.app')

@section('title', 'Профиль')
@section('content')
<h2>Профиль</h2>

<a class="btn btn-outline-primary" href="{{ route('logout') }}">Выйти из аккаунта</a>
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

    <form method="POST" action="{{ url('logout-self') }}">
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