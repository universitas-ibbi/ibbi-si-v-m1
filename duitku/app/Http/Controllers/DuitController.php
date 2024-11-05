<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuitController extends Controller
{
    public function index()
    {
        // ambil semua data dari tabel duit
        // $duit = \App\Models\Duit::all();

        // tampilkan view index.blade.php dengan variabel $duit
        return view("duit.index", [
            "duit" => \App\Models\Duit::all()
            // "duit" => $duit
        ]);
        // return view("duit.index",compact('duit'));
    }

    public function create()
    {
        return view("duit.create", [
            "duit" => \App\Models\Duit::all()
        ]);
    }

    public function store(Request $request)
    {

        $duit = new \App\Models\Duit();
        $duit->name = $request->name;
        $duit->type = $request->type;
        $duit->amount = $request->amount;
        $duit->save();

        return redirect()->route("duit.index")
            ->with([
                "message" => "Berhasil Tambah Data",
                "type" => "success",
            ]);
    }

    public function destroy($id)
    {
        $duit = \App\Models\Duit::find($id);
        $duit->delete();

        return redirect()->route("duit.index")
            ->with([
                "message" => "Berhasil Hapus Data",
                "type" => "danger",
            ]);
    }
}
