<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('manajemendata.sales', [
            'sales' => $sales,
            'customers' => Customer::all()
        ]);
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
        $sale = new Sale;
        $sale->kode_sales = $request->kode_sales;
        $sale->nama_sales = $request->nama_sales;
        $sale->telp_sales = $request->telp_sales;
        $sale->email_sales = $request->email_sales;
        $sale->customer_id = $request->customer_id;
        $sale->save();
        return redirect('/sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $sale = Sale::find($sale);
        return $sale;
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
    public function update(Request $request,Sale $sale)
    {
        Sale::where('id', $sale->id)
            ->update([
                'nama_sales' => $request->nama_sales,
                'telp_sales' => $request->telp_sales,
                'email_sales' => $request->email_sales,
                'customer_id' => $request->customer_id,
            ]);

        return redirect('/sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        Sale::destroy($sale->id);
        return redirect('/sales');
    }
}
