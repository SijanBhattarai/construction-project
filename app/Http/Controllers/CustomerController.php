<?php

namespace App\Http\Controllers;


use App\Customer;
use DB;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;

class CustomerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customers = Customer::latest()->get([ 'name', 'address', 'email', 'contact' ]);

        return view('backend.customer.index', compact('customers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('backend.customer.create');
    }

    /**
     * @param StoreCustomer $request
     * @return mixed
     */
    public function store(StoreCustomer $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            Customer::create($data);

        });

        return redirect()->route('customer.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Customer' ]));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view($customer->view, compact('customer'));
    }

    /**
     * @param Customer $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer)
    {


        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * @param UpdateCustomer $request
     * @param Customer $customer
     * @return mixed
     */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        DB::transaction(function () use ($request, $customer)
        {
            $customer->update($request->data($customer));


        });

        return redirect()->route('customer.index')->withSuccess('Customer has been updated');
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function delete(Customer $customer)
    {

        $customer->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Customer' ]));
    }
}

