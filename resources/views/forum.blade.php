<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
        @auth
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
        <x-jet-nav-link href="{{ route('mabe') }}" :active="request()->routeIs('made')">
            {{ __('CreateForum') }}
        </x-jet-nav-link>
        @else
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>
        @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($date as $el)
            <div class="container mx-auto relative lg:p-2 h-36 bg-white overflow-hidden shadow-xl sm:rounded-lg mt-2">
                <a href="{{ route('oneForum', $el->id) }}">
                    <h1 class="text-3xl break-all">
                        {{$el->title}}
                    </h1>
                    </a>
                <div class="flex flex-row absolute bottom-2">
                    <p class="">{{$el->NamePeople}}</p>
                </div>
                <div class="flex flex-row absolute bottom-2 right-6">
                <p class="text-right">{{$el->created_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>