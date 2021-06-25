<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use App\Http\Requests\CreateGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query('name', '');
        $results = Gallery::search($name)->orderBy('id','DESC')->with('images')->with('user')->with('comments');
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
        $comments = $gallery->comments;

        $user = $gallery->user;
        $results= [
            'id' => $gallery->id,
            'name'=>$gallery->name,
            'description'=>$gallery->description,
            'created_at'=>$gallery->created_at,
            'updated_at'=>$gallery->updated_at,
            'images'=>$images,
            'user'=>$user,
            'comments'=>$comments

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
