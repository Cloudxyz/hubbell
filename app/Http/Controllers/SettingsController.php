<?php

namespace App\Http\Controllers;

class SettingsController extends Controller
{
    public function index() 
    {
        $menu = [
            [
                'label' => __('Users'),
                'url'=> route('users')
            ],
            [
                'label' => __('Roles'),
                'url'=> route('roles')
            ],
        ];
        
        return view('settings.index')->with('menu', $menu);
    }
}
