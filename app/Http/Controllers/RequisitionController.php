<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequisition;
use App\Requisition;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequisitionController extends Controller
{
    public function index()
    {
        $requisitions = Requisition::orderBy('id','desc')->get();
        return view('backend.requisition.index',compact('requisitions'));
    }

    public function store(StoreRequisition $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();
            Requisition::create($data);

        });

        return redirect()->route('requisition.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Requisition Slip' ]));
    }

    public function create()
    {
        $sites=Site::latest()->pluck('name', 'id')->toArray();
        return view('backend.requisition.create', compact('sites'));
    }
}
