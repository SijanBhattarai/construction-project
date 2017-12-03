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
     * Create a new accounthead bar composer.
     */

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
            'route' => route('account.index'),
            'icon' => 'md md-web',
            'title' => 'Accounting'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('report.index'),
            'icon' => 'md md-list',
            'title' => 'Reports'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('accounthead.index'),
            'icon' => 'md md-list',
            'title' => 'AccountHead'
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