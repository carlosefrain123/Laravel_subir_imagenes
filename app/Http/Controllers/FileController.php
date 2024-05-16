<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    public function index()
    {
        $files=File::where('user_id',auth()->user()->id)->paginate(4);
        return view('admin.files.index', compact('files'));
    }
    public function create()
    {
        return view('admin.files.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        // Guardar la imagen en el almacenamiento
        $nombre = $request->file('file')->getClientOriginalName();
        $ruta = $request->file('file')->storeAs('public/imagenes', $nombre);
        // Obtener la URL de la imagen
        $url = Storage::url($ruta);
        // Crear una nueva entrada en la base de datos
        File::create([
            'user_id' => auth()->user()->id,
            'url' => $url
        ]);
        // Redireccionar
        return redirect()->route('admin.files.index');
    }

    public function show($file)
    {
        return view('admin.files.show');
    }
    public function edit(File $file)
    {
        return view('admin.files.edit', compact('file'));
    }
    public function destroy($file)
    {
        return view('admin.files.destroy');
    }
}
