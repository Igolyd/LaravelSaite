<x-app-layout>
<x-slot name="header">
    <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Support') }}
    </h2>
    </div>
    </x-slot>
    <form action="{{ route('mobius') }}"  enctype="multipart/form-data" method="post">
        @csrf
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="typeprob">{{_('Input the topic of the problem') }}</label>
            <input type="text" required name="typeprob" id="typeprob" placeholder="Input...." class="form-control  @error('typeprob') is-invalid @enderror">
            @error('typeprob')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            <label class="mt-2" for="message">{{_('Describe the problem')}}</label>
            <textarea name="message"id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        <button type="submit" class="btn btn-success mt-2 ml-3">{{ __('Send') }}</button>
        </div>
    </form>
</x-app-layout>
