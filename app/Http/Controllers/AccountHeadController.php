<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\AccountHead;
use App\Http\Requests\StoreAccountHead;
use App\Http\Requests\UpdateAccountHead;

class AccountHeadController extends Controller
{
    public function index()
    {
        $accountheads = AccountHead::latest()->get(['slug', 'accountname', 'rate']);

        return view('backend.accounthead.index', compact('accountheads'));
    }
    public function create()
    {

        return view('backend.accounthead.create');
    }

    /**
     * @param StoreAccountHead $request
     * @return mixed
     */
    public function store(StoreAccountHead $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            Accounthead::create($data);

        });

        return redirect()->route('accounthead.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Accounthead' ]));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(AccountHead $accounthead)
    {
        return view($accounthead->view, compact('accounthead'));
    }

    /**
     * @param Accounthead $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(AccountHead $accounthead)
    {


        return view('backend.accounthead.edit',compact('accounthead'));
    }

    /**
     * @param UpdateAccounthead $request
     * @param Accounthead $accounthead
     * @return mixed
     */
    public function update(UpdateAccountHead $request, AccountHead $accounthead)
    {
        DB::transaction(function () use ($request, $accounthead)
        {
            $accounthead->update($request->data($accounthead));


        });

        return redirect()->route('accounthead.index')->withSuccess('Accounthead has been updated');
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function destroy(AccountHead $accounthead)
    {

        $accounthead->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Accounthead' ]));
    }
}