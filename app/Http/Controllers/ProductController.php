<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        try {
            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/products'), $fileName);
            Product::create([
                'name' => $request->name,
                'image' => $fileName,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
            return redirect()->route('admin.product.index');
        } catch (\Throwable $th) {
            throw $th;
        }
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
        $categories = Category::all();
        $pro = Product::find($id);
        return view('admin.product.edit', compact('pro', 'categories'));
    }

    public function update(Request $request, $id)
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
        try {
            Product::find($id)->delete();
            return redirect()->route('admin.product.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
