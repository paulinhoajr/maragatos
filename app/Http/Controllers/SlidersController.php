<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class SlidersController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','store']]);
        $this->middleware('permission:slider-create', ['only' => ['create','store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    public function index() {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.sliders.index',compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(Request $request) {
        request()->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $slider = new Slider;
            $slider->titulo = $request->titulo;
            $slider->descricao = $request->descricao;
            $slider->ordem = count(Slider::all());
            $slider->save();

            DB::commit();
            return redirect()->route('sliders.index')->with('success','Slider criado com sucesso!');
        }catch (QueryException|\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->with('error', $exception->getMessage());
        }
    }

    public function edit(int $id) {
        $slider = Slider::where('id', $id)->first();
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, int $id) {
        request()->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'required|max:2048|image',
        ]);

        DB::beginTransaction();

        try{
            $slider = Slider::where('id', $id)->first();

            $slider->titulo = $request->titulo;
            $slider->descricao = $request->descricao;

            if($request->hasFile('imagem')) {
                $file = $request->file('imagem');
                $imageName = time() . '.png';

                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->resize(width: 1280, height: 720);
                $image->toPng()->save("uploads/{$imageName}");

                $slider->imagem = $imageName;
            }

            $slider->save();

            DB::commit();
            return redirect()->route('sliders.index')->with('success', 'Slider editado com sucesso!');
        }catch(QueryException|\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $exception->getMessage());
        }
    }

    public function show(int $id) {
        $slider = Slider::where('id', $id)->first();
        return view('admin.sliders.show', compact('slider'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $slider = Slider::where('id', $id)->first();
        $slider->delete();

        return redirect()->route('sliders.index')
            ->with('success','Slider deletado com sucesso');
    }
}
