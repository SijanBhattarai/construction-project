<?php

namespace App\Http\Controllers;

use App\AccountHead;
use App\Site;
use App\Transaction;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
//        $transactions = DB::table('transactions')->get();
        return view('backend.transaction.index', compact('transactions'));
    }

    public function store(StoreTransaction $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();
            Transaction::create($data);

        });

        return redirect()->route('transaction.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Transaction' ]));
    }
    public function create()
    {
//        $transactions = Transaction::latest()->get([ 'name']);
        $accountheads = AccountHead::latest()->pluck('accountname','id')->toArray();
        $sites=Site::latest()->pluck('name', 'id')->toArray();
        $customers=Customer::latest()->pluck('name', 'id')->toArray();
        return view('backend.transaction.create', compact('accountheads','sites','customers'));
    }


}
