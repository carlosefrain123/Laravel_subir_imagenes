@extends('layouts.app')
@section('content')
    <div class="w-full mx-auto">
        <div class="flex flex-wrap -mx">
            @foreach ($files as $file)
                <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4">
                    <div class="bg-white shadow-md rounded overflow-hidden">
                        <img src="{{ asset($file->url) }}" alt="" class="w-full h-48 object-cover">
                        <div class="p-4 border-t">
                            <a href="" class="inline-block bg-blue-500 text-white py-2 px-4 rounded mr-2">Editar</a>
                            <form action="" class="inline-block">
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
