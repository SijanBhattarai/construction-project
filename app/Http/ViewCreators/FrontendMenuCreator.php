<?php
namespace App\Http\ViewCreators;

use App\Menu;

use Illuminate\View\View;

class FrontendMenuCreator{
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
        $menus = Menu::orderBy('order','asc')->get();
        $view->with('allMenu',$menus);
    }
}