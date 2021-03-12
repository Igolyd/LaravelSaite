@extends('layouts.app')

@section('title', $data->title)
@section('content')
<h2>{{$data->title}}</h2>

<form action="{{ route('subforum') }}" method="post">
@csrf

<div class="col-4">
<input type="text" required name="forumsms" id="forumsms" placeholder="Написать сообщение" class="col-lg-12">
</div>
<button type="submit" class="btn btn-success mt-2 ml-3">Отправить</button>
</form>
@endsection