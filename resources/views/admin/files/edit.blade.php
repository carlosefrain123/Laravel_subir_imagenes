@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="w-full mx-auto">
        <div class="max-w-md mx-auto bg-white shadow-md rounded p-6">
            <h2 class="text-xl font-semibold mb-4">Editar Imagen</h2>
            <form action="{{ route('admin.files.update', $file) }}" method="POST" enctype="multipart/form-data"
                class="dropzone border border-gray-300 shadow-md rounded-md p-6" id="myDropzone">
                @csrf
                @method('PATCH')
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
            dictDefaultMessage: "Actualizar Imagen",
            acceptedFiles: "image/*",
            maxFilesize: 5,
            maxFiles: 1
        };
    </script>
@endsection
