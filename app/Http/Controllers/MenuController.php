<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'All Menus',
        ];
        return view('kepalatoko.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Add New Menu',
        ];

        return view('kepalatoko.menu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required|min:10|max:150',
            'foto' => 'required|mimes:img,png,jpg,jpeg|max:2048',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $namafile = 'Menu_' . $validated['nama_menu'];
            $validated['foto'] = $request->file('foto')->storeAs('/public/foto', $namafile . '.' . $ext);
        }
        Menu::create($validated);

        return redirect('/menu')->with('success', 'Success Added New Menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
