<?php

namespace App\Http\Controllers;

use App\Events\FileEvent;
use App\Http\Requests\FileRequest;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {
        $files = File::latest()->get();
        return view('file.index', compact('files'));
    }

    public function store(FileRequest $request)
    {
        $file = $request->file('file');
        $file->store('files');

        $file = File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $file->hashName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        broadcast(new FileEvent($file));

        return back()->with('success', 'Fichier envoyé avec succès.');
    }

    public function download(File $file)
    {
        return response()->download(storage_path('app/files/' . $file->path));
    }
}
