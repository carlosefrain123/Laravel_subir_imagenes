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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Actualizado',
                'Su imagen ha sido actualizada correctamente.',
                'success'
            );
        </script>
    @endif

    <script>
        Dropzone.options.myDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Actualizar Imagen",
            acceptedFiles: "image/*",
            maxFilesize: 5,
            maxFiles: 1,
            success: function(file, response) {
                // Aquí puedes manejar la respuesta si es necesario
                setTimeout(function() {
                    location.reload(); // Recargar la página para reflejar cambios
                }, 5000);
            },
            init: function() {
                this.on("success", function(file, response) {
                    Swal.fire(
                        'Actualizado',
                        'Su imagen ha sido actualizada correctamente.',
                        'success'
                    ).then(() => {
                        window.location.href = "{{ route('admin.files.index') }}";
                    });
                });
            }
        };
    </script>
@endsection
