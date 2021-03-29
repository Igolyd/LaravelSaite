<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Forum') }}
            </h2>
            <a href="{{ route('oneForum', $data->id) }}">
                <h1 class="text-3xl break-all">
                    {{_('Back')}}
                </h1>
                </a>
        </div>
    </x-slot>
    <form action="{{ route('updateForum', ['id'=> $data->id]) }}"  enctype="multipart/form-data" method="post">
        @csrf
    
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="forma">Введите тему форума</label>
            <input type="text" required name="forma" id="forma" placeholder="Тема форума..." value="{{$data->title}}" class="form-control  @error('forma') is-invalid @enderror">
            @error('forma')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            @error('image_forum')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            <label class="mt-2" for="message">Дополнение к заголовку(необезательно)</label>
            <textarea name="message"id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror">{{$data->message}}</textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        <button type="submit" class="btn btn-success mt-2 ml-3">Сохранить</button>
        </div>
    </form>
</x-app-layout>