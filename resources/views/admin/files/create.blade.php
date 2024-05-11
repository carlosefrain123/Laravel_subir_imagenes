@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <h1 style="color:white" class="text-center text-3xl font-bold mb-8">Subir imágenes</h1>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <form action="{{ route('admin.files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Seleccione una
                                imagen:</label>
                            <input type="file" name="file" id="file" accept="image/*"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Subir
                            imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
