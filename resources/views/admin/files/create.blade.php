@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-lg mx-auto">
            {{-- <form action="{{ route('admin.files.store') }}" class="dropzone border border-gray-300 shadow-md rounded-md p-6"
                id="myDropzone" method="POST" enctype="multipart/form-data">
                @csrf
            </form> --}}
            <form action="{{ route('admin.files.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Seleccione una imagen:</label>
                    <input type="file" name="file" id="file" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('file')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Subir imagen</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirla",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4
        };
    </script>
@endsection
