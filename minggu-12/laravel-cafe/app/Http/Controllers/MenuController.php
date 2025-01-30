<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view("menu.index");
    }

    public function simpan(Request $request){
        \App\Models\Menu::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga
        ]);

        return redirect()->route("menu.index");
    }
}
