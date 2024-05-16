@extends('layouts.app')

@section('content')
    <div class="w-full mx-auto">
        <div class="flex flex-wrap -mx">
            @foreach ($files as $file)
                <div class="w-full sm:w-1/2 md:w-1/3 px-4 mb-4">
                    <div class="bg-white shadow-md rounded overflow-hidden">
                        <img src="{{ asset($file->url) }}" alt="" class="w-full h-48 object-cover">
                        <div class="p-4 border-t">
                            <a href="{{ route('admin.files.edit', $file) }}"
                                class="inline-block bg-blue-500 text-white py-2 px-4 rounded mr-2">Editar</a>
                            <form action="{{ route('admin.files.destroy', $file) }}" method="POST"
                                class="inline-block formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $files->links() }}
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado',
                'Tu archivo ha sido eliminado.',
                'success'
            )
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.formulario-eliminar');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, bórralo!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
