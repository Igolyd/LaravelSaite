@extends('layouts.app')

@section('title', 'Поддержка')
@section('content')
<h2>Поддержка</h2>

<form action="{{ route('mobius') }}" method="post">
@csrf

<div class="form-group">
<label for="typeprob">Введите тему проблемы</label>
<input type="text" name="typeprob" id="typeprob" placeholder="Тема проблемы" class="form-control mb-2">
</div>
<div class="form-group">
<label for="message">Опишите проблему</label>
<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
</div>
<button type="submit" class="btn btn-success">Отправить</button>
</form>
@endsection