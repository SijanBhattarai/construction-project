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
        /*Get the list of all transactions*/
        $transactions = DB::select(DB::raw('select t.*,a.accountname as account_name,s.name as site_name from transactions t left join account_heads a on t.accounthead_id = a.id left join sites s on t.site_id = s.id'));

        /*To get the list of accountheads in an array*/
        $accountheads = DB::select(DB::raw('select id,accountname from account_heads'));
        $accountheadsArray = json_decode(json_encode($accountheads),true);

        /*To get the list of sites in an array*/
        $sites = DB::select(DB::raw('select id, name from sites'));
        $sitesArray = json_decode(json_encode($sites),true);
        return view('backend.transaction.index',compact('transactions','accountheadsArray','sitesArray'));
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
        /*To get the list of accountheads in an array*/
        $accountheads = DB::select(DB::raw('select id,accountname from account_heads'));
        $accountheadsArray = json_decode(json_encode($accountheads),true);

        /*To get the list of sites in an array*/
        $sites = DB::select(DB::raw('select id, name from sites'));
        $sitesArray = json_decode(json_encode($sites),true);

        /*To get the list of customers in an array*/
        $customers = DB::select(DB::raw('select id,name from customers'));
        $customersArray = json_decode(json_encode($customers),true);

        return view('backend.transaction.create', compact('accountheadsArray','sitesArray','customersArray'));
    }

    public function getTransactionDetailsById(Request $request)
    {   
        $transaction_id = $request->input('transaction_id');
        $sql = "select * from transactions where id = '$transaction_id'";
        $transactionData = DB::select(DB::raw($sql));
        $transactionDetails = json_encode($transactionData);

        print_r($transactionDetails);
    }

    public function edit(Request $request)
    {
        DB::transaction(function() use($request){
            $data = $request->input();
            $trans_id = $data['trans-id'];
            $device = Transaction::find($trans_id);
            $device->update($data);
        });
        return redirect()->route('transaction.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Transaction' ]));
    }
}
