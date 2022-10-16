<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Submenu;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = Menu::all();
        $sub    = Submenu::all();
        return  view('page.showSub', compact('sub','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return veiw('page.createSub');
    }

    public function crit($id)
    {
        $menu = Menu::find($id);
        return view('page.createSub', compact('menu'));
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
            'nama'  =>  'required',
            'link'  =>  'required',
            'id'    =>  'required|numeric',
        ]);

        $sub            = new Submenu();
        $sub->menu_id   = $request->id;
        $sub->nama      = $request->nama;
        $sub->link      = $request->link;

        $sub->save();
        return redirect()->route('submenu.index')->with('successMsg','Data Sub-Menu berhasil ditambahkan');
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
        $menu   = Menu::all();
        $sub    = Submenu::find($id);
        return view('page.editSub',compact('sub','menu'));
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
        $this->validate($request,[
            'menu'  =>  'required',
            'nama'  =>  'required',
            'link'  =>  'required',
            // 'id'    =>  'required|numeric',
        ]);

        $sub            = Submenu::find($id);
        $sub->menu_id   = $request->menu;
        $sub->nama      = $request->nama;
        $sub->link      = $request->link;

        $sub->save();
        return redirect()->route('submenu.index')->with('successMsg','Data Sub-Menu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub    = Submenu::find($id);
        $sub->delete();

        return redirect()->back()->with('successMsg','Data Berhasil Dihapus');
    }
}
