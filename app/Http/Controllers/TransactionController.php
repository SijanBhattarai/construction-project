<?php

namespace App\Http\Controllers;

use App\AccountHead;
use App\Site;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get([ 'name']);
        $accountheads = AccountHead::latest()->get(['accountname']);
        return view('backend.transaction.index', compact('transactions','accountheads'));
    }
    public function store(StoreTransaction $request)
    {
        $transaction = Transaction::create($request->Data());

        return back()->withSuccess(trans('messages.create_success', [ 'entity' => 'Transaction' ]))->with('collapse_in', $transaction->id);
    }

    public function create()
    {

        $transactions = Transaction::latest()->get([ 'name']);
        $accountheads = AccountHead::latest()->get(['accountname']);
        $sites = Site::latest()->get(['name']);
        return view('backend.transaction.create', compact('transactions','accountheads','sites'));    }

    /**
     * @param StoreTransaction $request
     * @param Transaction $transaction
     * @return mixed
     */

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request, Transaction $transaction)
    {
        foreach ($request->get('order') as $order => $transactionId)
        {
            $transaction = Transaction::find($transactionId);

            $transaction->update([ 'order' => $order ]);
        }

        if ($request->has('sub_menu_order'))
        {
            foreach ($request->get('sub_menu_order') as $transactionId => $subTransactionOrder)
            {
                foreach ($subTransactionOrder as $order => $subTransactionId)
                {
                    $subTransaction = SubTransaction::find($subTransactionId);

                    $subTransaction->update([ 'order' => $order ]);
                }
            }
        }

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'Transaction Order' ]));
    }

    /**
     * @param Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();


    }


    /**
     * @param Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

}
