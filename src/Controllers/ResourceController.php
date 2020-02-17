<?php

namespace JaopMX\FaqPackage\Controllers;

use Illuminate\Http\Request;
use JaopMX\FaqPackage\Models\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ResourceController extends Controller
{
    public function show()
    {
        $resources = Resource::all();

        return view('FaqPackage::resources', compact('resources'));
    }

    public function store(Request $request)
    {
        $validator = $this->validateFile($request);
        if($validator->fails())
        {
            return back()->with('error', $validator->errors()->first('file'));
        }
        if($this->storeResource($request)){
            return back()->with('success', 'Archivo cargado exitosamente');
        }else{
            return back()->with('error', 'El archivo que intentas subir ya existe :(');
        }
    }

    private function validateFile(Request $request)
    {
        $messages = [
            'resource.required' => 'Es necesario subir un archivo',
            'resource.mimes' => 'Los tipos de archivos permitidos son pdf,doc,docx,odt',
            'resource.max' => 'El archivo debe pesar menos de 8mb'
        ];
        $rules = [
            'resource' => 'required|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ];

        return Validator::make($request->all(),$rules,$messages);
    }

    private function storeResource(Request $request)
    {
        $fileName = $request->resource->getClientOriginalName();
        $fileExists = Storage::exists('resources/'.$fileName);
        if($fileExists){
            return false;
        }else{
            $mimeType = $request->resource->getMimeType();
            $resource = Resource::create(['name' => $fileName,'mime_type' => $mimeType]);
            Storage::put('resources/'.$fileName, file_get_contents($request->resource), 'public');
            return true;
        }
    }
}