<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function searchHome(){
        $products = Product::paginate(6);
        return view('searchproduct', compact('products'));
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

        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|digits_between:4,8',
            'stock' => 'required|numeric:min:1',
            'image' => 'required'
        ]);

        $image = $request->file('image');

        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('Asset', $imageName);
        }

        $product = new Product();

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $imageName;

        $product->save();

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $product = Product::find($product_id);

        return view('productdetail', compact('product'));
    }

    public function search(){

        $products = Product::where('category_id', '=', request()->get('category_id'))->paginate(6);


        if(request()->has('search') && request()->get('search') != ""){
            $search = request()->get('search');
            $products = Product::where([['title', 'like', '%'.$search.'%'],['category_id', '=', request()->get('category_id')]])->paginate(6);
        }

        return view('searchproduct', compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($item_id)
    {

        $product = Product::find($item_id);

        return view('updateproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|digits_between:4,8',
            'stock' => 'required|numeric:min:1',
            'image' => 'required'
        ]);

        $image = $request->file('image');

        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('Asset', $imageName);
        }

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $imageName;

        $product->save();

        return redirect('/home');
    }

    public function updateQuantity($quantity, $item_id){

        $product = Product::find($item_id);

        $product->stock -= $quantity;

        if($product->stock == 0){
            Product::destroy($item_id);
        }else{
            $product->save();
        }

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
