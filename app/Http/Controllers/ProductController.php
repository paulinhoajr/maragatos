<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'preco' => 'required',
            'upload.*' => 'required|image|max:2048',
        ]);

        $produto = new Product;
        $produto->name = $request->name;

        // remove prefix R$ e trocar, por .
        $produto->preco = str_replace(["R$ ", ","], ["", "."], $request->preco);

        $produto->save();

        if($request->hasFile('upload')) {
            foreach($request->file('upload') as $imageFile) {
                $imageName = time() . '.png';

                $manager = new ImageManager(new Driver());
                $image = $manager->read($imageFile);
                $image->toPng()->save("uploads/{$imageName}");

                $productImage = new ProductImage();
                $productImage->product_id = $produto->fresh()->id;
                $productImage->image = $imageName;
                $productImage->save();
            }
        }

        return redirect()->route('products.index')->with('success','Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): View
    {
        $product = Product::where('id', $id)->first();
        $imagens = $product->productImages;

        return view('admin.products.show', [
            'product' => $product,
            'imagens' => $imagens
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
    {
        $product = Product::where('id', $id)->first();
        $imagens = $product->productImages;

        return view('admin.products.edit', [
            'product' => $product,
            'imagens' => $imagens
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'preco' => 'required',
            'banner' => 'image|max:2048',
        ]);

        $produto = Product::where('id', $id)->first();
        $produto->name = $request->name;

        // remove prefix R$ e trocar, por .
        $produto->preco = str_replace(["R$ ", ","], ["", "."], $request->preco);

        if($request->hasFile('upload')) {
            foreach($request->file('upload') as $imageFile) {
                $imageName = time() . '.png';

                $manager = new ImageManager(new Driver());
                $image = $manager->read($imageFile);
                $image->toPng()->save("uploads/{$imageName}");

                $productImage = new ProductImage();
                $productImage->product_id = $produto->fresh()->id;
                $productImage->image = $imageName;
                $productImage->save();
            }
        }

        $produto->save();

        return redirect()->route('products.index')
            ->with('success','Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Produto deletado com sucesso');
    }
    public function destroyImage(int $id,): RedirectResponse
    {
        $pImage = ProductImage::where('id', $id)->first();
        $pImage->delete();

        return back()->with('success','Imagem deletada com sucesso');
    }
}
