@extends('layouts.app')

@section('title', 'Поддержка')
@section('content')
<h2>Поддержка</h2>

<form action="{{ route('subforum') }}" method="post">
@csrf

<div class="col-4">
<label for="typeprob">Введите тему проблемы</label>
<input type="text" required name="typeprob" id="typeprob" placeholder="Тема проблемы" class="col mb-2">
</div>
<div class="col-8">
<label for="message">Опишите проблему</label>
<textarea name="message" required id="message" cols="30" rows="10" class="form-control"></textarea>
</div>
<button type="submit" class="btn btn-success mt-2 ml-3">Отправить</button>
</form>
@endsection