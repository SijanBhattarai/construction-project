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
     * Create a new menu bar composer.
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
            'route' => route('menu.index'),
            'icon' => 'md md-web',
            'title' => 'Menu'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('gallery.index'),
            'icon' => 'md md-list',
            'title' => 'gallery'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('document.index'),
            'icon' => 'md md-list',
            'title' => 'document'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('page.index'),
            'icon' => 'md md-list',
            'title' => 'page'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('email.index'),
            'icon' => 'md md-list',
            'title' => 'email'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('notice.index'),
            'icon' => 'md md-list',
            'title' => 'notice'
        ]);

        array_push($menu, [
            'class' => false,
            'route' => route('form.index'),
            'icon' => 'md md-list',
            'title' => 'form'
        ]);


        /*
         * Sample for adding menu
         * array_push($menu,
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