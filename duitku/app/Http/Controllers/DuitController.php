<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuitController extends Controller
{
    public function index()
    {
        return view("duit.index");
    }

    public function create()
    {
        return view("duit.create");
    }

    public function store(Request $request)
    {
        return redirect()->route("duit.index")
            ->with([
                "message" => "Berhasil Tambah Data",
                "type" => "success",
            ]);
    }

    public function destroy($id)
    {
        return redirect()->route("duit.index")
            ->with([
                "message" => "Berhasil Hapus Data",
                "type" => "danger",
            ]);
    }
}
