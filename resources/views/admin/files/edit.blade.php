@extends('layouts.app')

@section('content')
    <div class="w-full mx-auto">
        <div class="max-w-md mx-auto bg-white shadow-md rounded p-6">
            <h2 class="text-xl font-semibold mb-4">Editar Imagen</h2>
            <form action="{{ route('admin.files.update', $file) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="file">Nueva Imagen</label>
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('file')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
