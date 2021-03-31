{{-- @foreach($user as $el)
<div class="container mx-auto relative lg:p-2 h-36 bg-white overflow-hidden shadow-xl sm:rounded-lg mt-2">
    <a href="{{ route('anotherprofile', ['name' => $el->name]) }}">
        <h1 class="text-3xl break-all">
            {{$el->name}}
        </h1>
        </a>
    <div class="flex flex-row absolute bottom-2 right-6">
    <p class="text-right">{{$el->created_at}}</p>
    </div>
</div>
@endforeach --}}