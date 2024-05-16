@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-lg mx-auto">
            <form action="{{ route('admin.files.store') }}" class="dropzone border border-gray-300 shadow-md rounded-md p-6"
                id="myDropzone" method="POST" enctype="multipart/form-data">
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Dropzone.options.myDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirla",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4,
            successmultiple: function(files, response) {
                // Mostrar SweetAlert después de la subida exitosa
                Swal.fire(
                    'Subida exitosa',
                    'Sus imágenes fueron subidas con éxito.',
                    'success'
                );
            },
            init: function() {
                this.on("success", function(file, response) {
                    // Puedes manejar la respuesta individualmente si es necesario
                });
                this.on("queuecomplete", function() {
                    // Mostrar SweetAlert después de que se complete la cola
                    Swal.fire(
                        'Subida exitosa',
                        'Sus imágenes fueron subidas con éxito.',
                        'success'
                    );
                });
            }
        };
    </script>
@endsection
