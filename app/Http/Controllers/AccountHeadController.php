<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountHead;
use App\Http\Requests\StoreAccountHead;

class AccountHeadController extends Controller
{
    public function index()
    {
        $accountheads = AccountHead::latest()->get([ 'slug','accountname']);

        return view('backend.accounthead.index', compact('accountheads'));
    }
    public function create()
    {
        return view('backend.page.create');
    }

    public function store(StoreAccountHead $request)
    {
        $accounthead = AccountHead::create($request->Data());

        return back()->withSuccess(trans('messages.create_success', [ 'entity' => 'AccountHead' ]))->with('collapse_in', $accounthead->id);

    }


    /**
     * @param StoreAccountHead $request
     * @param AccountHead $accounthead
     * @return mixed
     */

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request, AccountHead $accounthead)
    {
        foreach ($request->get('order') as $order => $accountheadId)
        {
            $accounthead = AccountHead::find($accountheadId);

            $accounthead->update([ 'order' => $order ]);
        }


        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'AccountHead Order' ]));
    }

    /**
     * @param AccountHead $accounthead
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(AccountHead $accounthead)
    {
        $accounthead->delete();
        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'AccountHead' ]));

    }
    public function shows(AccountHead $accounthead)
    {
        return view($accounthead->view, compact('accounthead'));
    }


    /**
     * @param AccountHead $accounthead
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

}
