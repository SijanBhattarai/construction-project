<?php
namespace App\Http\ViewCreators;

use App\Menu;

use Illuminate\View\View;

class TestViewCreator{
    protected $data;

    public function  __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $data = $this->data;

        View::composer('partial_name', function( $view ) use ($data)

        $view->with('data',$data);
    }
}