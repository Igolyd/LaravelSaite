<x-app-layout>
    <div class="py-12">
        <div class="container max-w-8xl relative mx-auto sm:px-6 lg:px-4 bg-white">
            <h1 class="text-3xl break-all py-3 px-2">
                {{$data->title}}
            </h1>
            @if (isset($data->message))
            <hr>
            <p>
                {{$data->message}}
            </p>
            @endif
            <hr>
            <div class="flex flex-row max-w-8xl">
            <p class="">{{$data->NamePeople}}</p>
            <p class="text-right mx-2">{{$data->created_at}}</p>
            </div>
            @auth
            @if (Auth::user()->name == $data->NamePeople)
            <a href="{{ route('updateOneForum', $data->id) }}">
                <h1 class="text-3xl break-all">
                    {{_('Edit')}}
                </h1>
                </a>
            <x-jet-button href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('IsReady?') }}
            </x-jet-button>
            @endif
            @endauth
        </div>
        @auth
        <form action="{{ route('createMessage', ['id'=> $data->id])}}" method="post">
            @csrf
             <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
             <label class="mt-2" for="message">{{_('Write a message...')}}</label>
             <textarea name="message"id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>
             @error('message')
             <div class="alert alert-danger">{{ $message}}</div>
             @enderror
             <button type="submit" class="btn btn-success mt-2 ml-3">Отправить</button>
             </div>
         </form>
        @else
         <span class="">
             {{_('In order to write a message you need to')}}
             <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{_('Login')}}</a>
             {{_('/')}}
             <a href="{{ route('register') }}" class=" text-sm text-gray-700 underline">{{_('Register')}}</a>

         </span>
        @endauth
        <div>                
            @if (isset($forum))
            @foreach($forum as $del)
            @if ($del->ForumId == $data->id)
            <div class="container mx-auto lg:p-2 bg-white overflow-hidden shadow-xl sm:rounded-lg mt-2">
               <div class="flex">
                <div class="mr-2 flex-initial">
        @auth
                    @if (Auth::user()->id == $del->PeopleID)
                    @if (Auth::user()->profile_photo_path !== $del->profile_photo_path)
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name  }}" class="rounded-full h-20 w-20 object-cover">
                    @else
                <img src="{{ $del->profile_photo_path }}" alt="{{ $del->NamePeople }}" class="rounded-full h-20 w-20 object-cover">
                    @endif
                @else
                <img src="{{ $del->profile_photo_path }}" alt="{{ $del->NamePeople }}" class="rounded-full h-20 w-20 object-cover">
                @endif
            </div>
            <div class="flex-1">
            <div class="mt-1.5 flex-col">
                @if (Auth::user()->id == $del->PeopleID)
                    @if (Auth::user()->name !== $del->NamePeople)
                    <h1 class="break-all">
                        {{Auth::user()->name}}
                    </h1>
                    @else
                    <h1 class="break-all">
                        <h1 class="break-all">
                            {{$del->NamePeople}}
                            </h1>
                    @endif
                @else
                <h1 class="break-all">
                    {{$del->NamePeople}}
                    </h1>
                @endif
            <h1 class="text-3xl break-all">
                {{$del->message}}
            </h1>
            </div>
        </div>
    @else
<img src="{{ $del->profile_photo_path }}" alt="{{ $del->NamePeople }}" class="rounded-full h-20 w-20 object-cover">
</div>
<div class="flex-1">
<div class="mt-1.5 flex-col">
    <h1 class="break-all">
        {{$del->NamePeople}}
        </h1>
        <h1 class="text-3xl break-all">
            {{$del->message}}
        </h1>
</div>
</div>
            @endauth
            </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</x-app-layout>