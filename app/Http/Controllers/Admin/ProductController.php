<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $productValidation = [
        'name' => 'required:max:60',
        'image' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->restaurant->products;


        return view('admin.restaurants.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->productValidation);
    
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        $data['slug'] = Str::slug($data['name']);

        $product = new Product();
        $product->fill($data);
        $product->save();

        return redirect()->route('admin.restaurants.products.index')
            ->with('message', 'Il prodotto "' . $product->name . '" è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.restaurants.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.restaurants.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->all();
        
        $request->validate($this->productValidation);

        $data['restaurant_id'] = Auth::id();
        $data['slug'] = Str::slug($data['name']);
        $product->update($data);

        /**
         * CAMBIARE MESSAGGIO AL UPDATE
         */
        
        return redirect()->route('admin.restaurants.products.index')->with('success', 'Item addedd successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        /**
         * CAMBIARE MESSAGGIO AL DELETE
         */

        return redirect()->route('admin.restaurants.products.index')->with('deleted', 'Item deleted successfully');
    }
}
