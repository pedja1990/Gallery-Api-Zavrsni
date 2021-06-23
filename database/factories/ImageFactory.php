<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => 'https://www.tripsavvy.com/thmb/vLOWxjCoy7EO8RGxOifrMLCQrPY=/1500x1004/filters:fill(auto,1)/thingstodoinmadridskyline-d05bf06ef9144f04973d5bfc50fbcee6.jpg',
            'gallery_id' => Gallery::inRandomOrder()->first()->id
        ];
    }
}
