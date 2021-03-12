@extends('layouts.app')
@section('title', 'Форум')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <a class="btn btn-outline-primary" href="{{ route('mabe') }}">Создать форум</a>
            <div class="container">
                <h1 class="">Форум</h1>
                </div>
                @foreach($date as $el)
                <div class="alert-light mt-3">
                <nav class="nav">
                <img class="img-thumbnail border-0 mt-1 ml-1" style="width: 90px; height: 85px; border-radius: 100px; box-shadow: 0 0 5px #666" src="{{ asset('/storage/' .$el->path_img)}}">
                <div class="col-lg-10">
                <a href="{{ route('oneForum', $el->id) }}">
                <h4 class="text-break mt-1 ml-1">
                    {{$el->title}}
                </h4>
                </a>
                </div>
            </nav>
                <div class="row">
                    <p class="align-content-end mr-2 ml-3">{{$el->namePeople}}</p>
                    <p class="align-content-end">{{$el->created_at}}</p>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection