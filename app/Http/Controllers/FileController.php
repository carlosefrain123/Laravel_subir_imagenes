<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)->paginate(4);
        return view('admin.files.index', compact('files'));
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        // Validar que al menos un archivo ha sido subido
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        // Procesar cada archivo subido
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nombre = $file->getClientOriginalName();
            $ruta = $file->storeAs('public/imagenes', $nombre);

            $url = Storage::url($ruta);

            // Crear registro en la base de datos
            File::create([
                'user_id' => auth()->user()->id,
                'url' => $url
            ]);
        }

        // Retornar una respuesta JSON
        return response()->json(['success' => 'Archivos subidos correctamente']);
    }


    public function show($file)
    {
        return view('admin.files.show');
    }

    public function edit(File $file)
    {
        return view('admin.files.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        // Eliminar la imagen anterior
        $oldUrl = str_replace('/storage', 'public', $file->url);
        Storage::delete($oldUrl);

        // Guardar la nueva imagen
        $nombre = $request->file('file')->getClientOriginalName();
        $ruta = $request->file('file')->storeAs('public/imagenes', $nombre);

        // Actualizar la URL de la imagen en la base de datos
        $file->url = Storage::url($ruta);
        $file->save();

        return redirect()->route('admin.files.edit', $file)->with('update', 'ok');
    }


    public function destroy(File $file)
    {
        $url = str_replace('/storage', 'public', $file->url);
        Storage::delete($url);
        $file->delete();

        return redirect()->route('admin.files.index')->with('eliminar', 'ok');
    }
}
