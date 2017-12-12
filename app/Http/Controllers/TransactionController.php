<?php

namespace App\Http\Controllers;

use App\AccountHead;
use App\Site;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get([ 'name','accounthead','site','amount']);
        $accountheads = AccountHead::latest()->get(['accountname']);
        $sites = SIte::latest()->get(['name']);
        return view('backend.transaction.index', compact('transactions','accountheads','sites'));
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

        $transactions = Transaction::latest()->get([ 'name']);
        $accountheads = AccountHead::latest()->get(['accountname']);
        $sites = Site::latest()->get(['name']);
        return view('backend.transaction.create', compact('transactions','accountheads','sites'));
    }


}
