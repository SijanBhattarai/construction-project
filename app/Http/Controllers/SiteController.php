<?php

namespace App\Http\Controllers;


use App\Site;
use DB;
use App\Http\Requests\StoreSite;
use App\Http\Requests\UpdateSite;

class SiteController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sites = Site::latest()->get([ 'name', 'location', 'description' ]);

        return view('backend.site.index', compact('sites'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('backend.site.create');
    }

    /**
     * @param StorePost $request
     * @return mixed
     */
    public function store(StoreSite $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            Site::create($data);


        });

        return redirect()->route('site.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Site' ]));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Site $site)
    {
        return view($site->view, compact('site'));
    }

    /**
     * @param Site $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Site $site)
    {


        return view('backend.site.edit',compact('site'));
    }

    /**
     * @param UpdateSite $request
     * @param Site $site
     * @return mixed
     */
    public function update(UpdateSite $request, Site $site)
    {
        DB::transaction(function () use ($request, $site)
        {
            $data = $request->data();

            $site->update($data);

        });

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'Site' ]));
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function destroy(Site $site)
    {

        $site->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Site' ]));
    }
}

