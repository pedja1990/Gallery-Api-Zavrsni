<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index(){

       return Gallery::all();

    }
    public function store(CreateGalleryRequest $request){
        $data = $request->all();

        return Gallery::create($data);
    }
    public function show($id){

        $gallery = Gallery::findOrFail($id);

        return $gallery;

    }
    public function update(Request $request, $id){

        return Gallery::findOrFail($id)->update($request->all());
    }
    public function destroy($id){
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return $gallery;

    }

}
