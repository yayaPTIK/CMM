<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class LandingPage extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('finish',compact('menu'));
    }
}
