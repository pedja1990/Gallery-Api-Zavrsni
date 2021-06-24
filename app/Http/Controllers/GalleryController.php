<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index(){

        $results = Gallery::with('user', 'images');
        $galleries = $results->get();

        return response()->json($galleries);
    }
    public function store(CreateGalleryRequest $request){
        $data = $request->all();

        return Gallery::create($data);
    }
    public function show($id){

        $gallery = Gallery::findOrFail($id);
        $images = $gallery->images;

        $user = $gallery->user;
        $results= [
            'id' => $gallery->id,
            'name'=>$gallery->name,
            'description'=>$gallery->description,
            'created_at'=>$gallery->created_at,
            'updated_at'=>$gallery->updated_at,
            'images'=>$images,
            'user'=>$user,

        ];

        return response()->json($results);

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
