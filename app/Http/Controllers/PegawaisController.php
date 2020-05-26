<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use Illuminate\Http\Request;

class PegawaisController extends Controller
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
        // return view('manajemendata.sale', [
        //     'customers' => Customer::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Sale::create($request->all());
        $sale = new Sale;
        $sale->kode_sale = $request->kode_sale;
        $sale->nama_sale = $request->nama_sale;
        $sale->telp_sale = $request->telp_sale;
        $sale->email_sale = $request->email_sale;
        $sale->customer_id = $request->customer_id;
        $sale->save();
        return redirect('/sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $sale = Sale::find($sale);
        dd($sale);
        return $sale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        Sale::where('id', $sale->id)
            ->update([
                'nama_sale' => $request->nama_sale,
                'telp_sale' => $request->telp_sale,
                'email_sale' => $request->email_sale,
                'customer_id' => $request->customer_id,
            ]);

        return redirect('/sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        Sale::destroy($sale->id);
        return redirect('/sales');
    }
}
