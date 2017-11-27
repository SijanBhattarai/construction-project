<?php
namespace App\Http\ViewCreators;

use App\Gallery;
use App\Menu;

use Illuminate\View\View;

class FrontendAdsCreator{
    protected $user;

    public function  __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * @param View $view
     */
    public function create(View $view)
    {
        $ads = Gallery::where('view', 'Ads')->get();
        $view->with('allAds',$ads);
    }
}