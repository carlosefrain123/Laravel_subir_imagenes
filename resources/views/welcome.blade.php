@extends('layouts.app2')
@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($files as $file)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset($file->url) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection

