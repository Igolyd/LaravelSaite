<x-app-layout>
    <x-slot name="header">
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Forum') }}
            </h2>
        </div>
    </x-slot>
    <form action="{{ route('subforum') }}"  enctype="multipart/form-data" method="post">
        @csrf
    
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="forma">{{_('Input the topic of the forum')}}</label>
            <input type="text" required name="forma" id="forma" placeholder="Input..." class="form-control  @error('forma') is-invalid @enderror">
            @error('forma')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            @error('image_forum')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            <label class="mt-2" for="message">{{_('supplement(optional)')}}</label>
            <textarea name="message"id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        <button type="submit" class="btn btn-success mt-2 ml-3">{{ __('Send') }}</button>
        </div>
    </form>
</x-app-layout>