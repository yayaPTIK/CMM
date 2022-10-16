<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Submenu;

// use str_slug() to generate a URL friendly "slug" from a string
use Illuminate\Support\Str;
use Carbon\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus  = Menu::latest()->get();
        $sub    = Submenu::latest()->get();
        return view('page.showMenu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'  => 'required',
            'warna' => 'required',
            'icon'  => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        $image  = $request->file('icon');
        $slug   = Str::slug($request->nama);

        if(isset($image)){
            $currentDate    = Carbon::now()->toDateString();
            $imageName      = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/icon')){
                mkdir('uploads/icon', 0077, true);
            }
            $image->move('uploads/icon', $imageName);
        }else{
            $image = 'default.jpg';
        }

        $menu = new Menu();
        $menu->nama     = $request->nama;
        $menu->slug     = $slug;
        $menu->icon     = $imageName;
        $menu->warna    = $request->warna;
        $menu->save();

        return redirect()->back()->with('successMsg','Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('page.editMenu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'nama'  => 'required',
        //     'warna' => 'required',
        //     'icon'  => 'mimes:jpg,png,jpeg,bmp',
        // ]);

        $image  = $request->file('icon');
        $slug   = Str::slug($request->nama);
        $menu   = Menu::find($id);

        if(isset($image)){
            $currentDate    = Carbon::now()->toDateString();
            $imageName      = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/icon')){
                mkdir('uploads/icon', 0077, true);
            }
            unlink('uploads/icon/'.$menu->icon);
            $image->move('uploads/icon', $imageName);
        }else{
            $imageName = $menu->icon;
        }
        
        $menu->nama     = $request->nama;
        $menu->slug     = $slug;
        $menu->icon     = $imageName;
        $menu->warna    = $request->warna;

        $menu->save();
        return redirect()->route('menu.index')->with('successMsg','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if(file_exists('uploads/icon/'.$menu->icon)){
            unlink('uploads/icon/'.$menu->icon);
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('successMsg','Data Berhasil Dihapus!');
    }
}
