<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseHeader;
use App\Models\PurchaseDetail;
use App\Models\Cart;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = PurchaseHeader::where('user_id', '=', auth()->user()->user_id)->get();

        return view('transaction', compact('purchases'));
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
        $purchaseHeader = new PurchaseHeader();

        $purchaseHeader->user_id = auth()->user()->user_id;

        $purchaseHeader->save();

        $productController = new ProductController();

        $carts = Cart::where('user_id', '=', auth()->user()->user_id)->get();

        foreach ($carts as $cart){
            $purchaseDetail = new PurchaseDetail();

            $purchaseDetail->purchase_header_id = $purchaseHeader->purchase_header_id;
            $purchaseDetail->product_id = $cart->product_id;
            $purchaseDetail->quantity = $cart->quantity;

            $purchaseDetail->save();

            $productController->updateQuantity($cart->quantity, $cart->product_id);
        }

        (new CartController)->destroyAllCart();

        Return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseHeader  $purchaseHeader
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchaseDetails = PurchaseDetail::where('purchase_header_id', '=', $id)->join('products', 'products.product_id', '=', 'purchase_details.purchase_header_id')->get();

        $total = 0;

        foreach($purchaseDetails as $purchaseDetail){
            $total += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        return view('purchasedetail', compact('purchaseDetails'), compact('total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseHeader  $purchaseHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseHeader $purchaseHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseHeader  $purchaseHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseHeader $purchaseHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseHeader  $purchaseHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseHeader $purchaseHeader)
    {
        //
    }
}
