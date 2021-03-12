@extends('layouts.app')

@section('title', 'Редактирование профиля')
@section('content')

<form enctype="multipart/form-data" action="{{ route('editProvileSubmit', ['name'=>Auth::user()->name]) }}" method="post">
@csrf

<div class="col-4">
<label for="typeprob">Введите новый логин</label>
<input type="text" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="Не пишите, если не хотите изменить ник" class="col mb-2">
</div>
<div class="col-4">
<label class="mt-4" for="image_provile">Установите другую картинку</label>
<div class="form-group">
<input type="file" name="image_provile" id="image_forum" class="@error('image_forum') is-invalid @enderror">
</div>
</div>
<button type="submit" class="btn btn-success mt-2 ml-3">Отправить</button>
</form>
<div class=" container-fluid mt-3">
<a href="{{ route('editProvile', Auth::user()->name) }}">
    <button type="submit" class="btn btn-success">
        {{ __('Изменить почту') }}
    </button>
    </a>
    <a class="" href="{{ route('editProvile', Auth::user()->name) }}">
        <button type="submit" class="btn btn-success">
            {{ __('Изменить пароль') }}
        </button>
        </a>
</div>
@endsection