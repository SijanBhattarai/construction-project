<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class BackendMenuCreator
{

    /**
     * The user model.
     *
     * @var \App\User;
     */
    protected $user;



    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => url('/home'),
            'icon' => 'md md-home',
            'title' => 'Home'
        ];
        array_push($menu, [
            'class' => false,
            'route' => route('site.index'),
            'icon' => 'md md-list',
            'title' => 'Site'
        ]);
        
        array_push($menu, [
            'class' => false,
            'route' => route('accounthead.index'),
            'icon' => 'md md-list',
            'title' => 'AccountHead'
        ]);


        array_push($menu, [
            'class' => false,
            'route' => route('transaction.index'),
            'icon' => 'md md-web',
            'title' => 'Transaction'
        ]);
        array_push($menu, [
            'class' => false,
            'route' => route('sales.index'),
            'icon' => 'md md-list',
            'title' => 'Sales Details'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('user.index'),
            'icon'  => 'md md-accessibility',
            'title' => 'Users'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('report.index'),
            'icon' => 'md md-list',
            'title' => 'Reports'
        ]);


        /*
         * Sample for adding accounthead
         * array_push($accounthead,
            [
                'class' => {desired class},
                'route' => {desired route or url},
                'icon'  => {md or fa icon class},
                'title' => {title},
                \\Optional Sub Menu Items
                'items' => [
                    ['route' => {route or url}, 'title' => {title}],
                    ...
                ]
            ]);
         */


        $view->with('allMenu', $menu);
    }
}