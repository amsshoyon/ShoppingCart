<?php

namespace Bitfumes\Multiauth\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;
use App\Product;
use App\Category;
use App\subcategory;
use App\Color;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::with('Category')->orderBy('id', 'DESC')->paginate(30);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $colors = Color::all();
        return view('vendor.multiauth.products.index')->with(compact('products', 'categories', 'subcategories', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Product;
        $store->model = $request->input('model');
        $store->brand = $request->input('brand');
        $store->category_id = $request->input('category_id');
        $store->subcategory_id = $request->input('subcategory_id');
        $store->color_id = $request->input('color_id');
        $store->quantity = $request->input('quantity');
        $store->price = $request->input('price');
        $store->release = $request->input('release');
        $store->details = $request->input('details');
        $store->cover = 'image.jpg';
        $store->save();
        return back()->with('message', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
