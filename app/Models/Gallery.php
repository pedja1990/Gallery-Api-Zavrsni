<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','user_id'];

    public function user(){

        return $this->belongsTo(User::class);
     }

     public function images() {

        return $this->hasMany(Image::class);
    }


    public function addImages($source, $id) {
        return $this->images()->create([
            'source' => $source,
            'gallery_id' => $id
        ]);
    }

    public static function search($name="") {
        return self::where("name", "LIKE", "%$name%");
    }


}
