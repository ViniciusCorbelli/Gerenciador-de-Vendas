<?php

namespace App\Http\Controllers;

use App\Sell;
use App\Product;
use App\Http\Requests\SellRequest;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sell::all();
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sell = new Sell();
        $products = Product::all();
        return view('admin.sales.create', compact('sell', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date('d/m/Y');
        Sell::create($data);
        return redirect()->route('sales.index')->with('success', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        $products = Product::all();
        return view('admin.sales.edit', compact('sell', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellRequest $request, Sell $sell)
    {
        $sell->update($request->all());
        return redirect()->route('sales.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        $sell->delete();
        return redirect()->route('sales.index')->with('success', true);
    }
}
