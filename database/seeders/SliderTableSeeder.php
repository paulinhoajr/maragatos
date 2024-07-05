<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = new Slider();
        $slider->titulo = "Default";
        $slider->descricao = "Slider de teste";
        $slider->imagem = "default.png";
        $slider->save();
    }
}
