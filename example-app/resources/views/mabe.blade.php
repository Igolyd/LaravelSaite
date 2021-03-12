@extends('layouts.app')

@section('title', 'Создание форума')
@section('content')

<div class="container">
<div class="col-mb-8">
    <a class="btn btn-outline-primary mb-2" href="{{ route('setforum') }}">Выйти из создания форума</a>
</div>
</div>
<form action="{{ route('subforum') }}"  enctype="multipart/form-data" method="post">
    @csrf
    
<div class="container">
        <label for="forma">Введите тему форума</label>
        <input type="text" required name="forma" id="forma" placeholder="Тема форума..." class="form-control  @error('forma') is-invalid @enderror">
        @error('forma')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
        <label class="mt-4" for="image_forum">Установите картинку</label>
        <div class="form-group">
        <input type="file" required name="image_forum" id="image_forum" class="@error('image_forum') is-invalid @enderror">
        </div>
        @error('image_forum')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
        <label class="mt-2" for="message">Ваше первое сообщение на форуме(необезательно)</label>
        <textarea name="message"id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>
        @error('message')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
    <button type="submit" class="btn btn-success mt-2 ml-3">Отправить</button>
</div>
</form>
@endsection