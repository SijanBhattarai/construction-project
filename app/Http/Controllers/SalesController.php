<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSales;
use App\Sales;
use App\Site;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::orderBy('id', 'desc')->get();
        return view('backend.sales.index', compact('sales'));
    }

    public function store(StoreSales $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            Sales::create($data);

        });

        return redirect()->route('sales.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Sales' ]));
    }

    public function create()
    {
        $sites=Site::latest()->pluck('name', 'id')->toArray();
        $customers=Customer::latest()->pluck('name', 'id')->toArray();
        return view('backend.sales.create', compact('sites','customers'));
    }

    public function edit(Sales $sale)
    {
        $sites=Site::latest()->pluck('name', 'id')->toArray();

        return view('backend.sales.edit',compact('sale','sites'));
    }

    /**
     * @param UpdateSite $request
     * @param Site $site
     * @return mixed
     */
    public function update(UpdateSales $request, Sales $sale)
    {
        DB::transaction(function () use ($request, $sale)
        {
            $sale->update($request->data($sale));

        });

        return redirect()->route('sales.index')->withSuccess('Sales has been updated');
    }
}
