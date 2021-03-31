<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    @if (session('good'))
    <div class="" role="alert">
        {{ session('good') }}
    </div>
@endif
{{-- @for ($x=0;$x<2;$x++)
@if ($x < 1)
 @foreach ($arct as $obj)
 <div class=" bg-white py-2 mt-4 flex max-w-7xl mx-auto overflow-hidden shadow-xl sm:rounded-lg">
    <div class="max-w-md bg-gray-700 max-h-full mx-2">
    <img src="{{ $obj->profile_photo_path}}" class="h-60 w-full object-cover">
    <h1 class="break-all">
        {{$obj->message}}
    </h1>
    </div>
 @endforeach 
@endif
     @foreach ($arct as $obj)
    <div class="max-w-md bg-gray-700 max-h-full mx-2">
    <img src="{{ $obj->profile_photo_path}}" class="h-60 w-full object-cover">
    <h1 class="break-all">
        {{$obj->message}}
    </h1>
    </div>
 @endforeach   
@endfor --}}
    

               <div class=" bg-white py-2 mt-4 flex max-w-7xl mx-auto overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-md bg-gray-700 max-h-full mx-2">
                        <a href="{{ route('arcticle', $arct[0]->id) }}">
                    <img src="{{ asset('/storage/' .$arct[0]->profile_photo_path)}}" class="h-60 w-full object-cover">
                        </a>
                    <a href="{{ route('arcticle', $arct[0]->id) }}">
                    <h1 class="break-all">
                        {{$arct[0]->message}}
                    </h1>
                </a>
                    </div>
                    <div class="max-w-md bg-gray-700 max-h-full mx-2">
                        <a href="{{ route('arcticle', $arct[1]->id) }}">
                        <img src="{{ asset('/storage/' .$arct[1]->profile_photo_path)}}" class="h-60 w-full object-cover">
                        </a>
                        <a href="{{ route('arcticle', $arct[1]->id) }}">
                        <h1 class="break-all">
                            {{$arct[1]->message}}
                        </h1>
                    </a>
                        </div>
                        <div class="max-w-md bg-gray-700 max-h-full mx-2">
                            <a href="{{ route('arcticle', $arct[2]->id) }}">
                            <img src="{{ asset('/storage/' .$arct[2]->profile_photo_path)}}" class="h-60 w-full object-cover">
                            </a>
                            <a href="{{ route('arcticle', $arct[2]->id) }}">
                            <h1 class="break-all">
                                {{$arct[2]->message}}
                            </h1>
                            </a>
                            </div>
                </div>
                <div class=" bg-white py-2 mt-4 flex max-w-7xl mx-auto  overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-md bg-gray-700 max-h-full mx-2">
                        <a href="{{ route('arcticle', $arct[3]->id) }}">
                        <img src="{{ asset('/storage/' .$arct[3]->profile_photo_path)}}" class="h-60 w-full object-cover">
                        </a>
                        <a href="{{ route('arcticle', $arct[3]->id) }}">
                        <h1 class="break-all">
                            {{$arct[3]->message}}
                        </h1>
                        </a>
                        </div>
                        <div class="max-w-md bg-gray-700 max-h-full mx-2">
                            <a href="{{ route('arcticle', $arct[4]->id) }}">
                            <img src="{{ asset('/storage/' .$arct[4]->profile_photo_path)}}" class="h-60 w-full object-cover">
                            </a>
                            <a href="{{ route('arcticle', $arct[4]->id) }}">
                            <h1 class="break-all">
                                {{$arct[4]->message}}
                            </h1>
                            </a>
                            </div>
                            <div class="max-w-md bg-gray-700 max-h-full mx-2">
                                <a href="{{ route('arcticle', $arct[5]->id) }}">
                                <img src="{{ asset('/storage/' .$arct[5]->profile_photo_path)}}" class="h-60 w-full object-cover">
                                </a>
                                <a href="{{ route('arcticle', $arct[5]->id) }}">
                                <h1 class="break-all">
                                    {{$arct[5]->message}}
                                </h1>
                                </a>
                                </div>
                </div>
</x-app-layout>
