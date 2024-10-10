<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        $menu = 'Obat';
        $subMenu = 'Index';
        return view('admin.obat.index', compact('obats', 'menu', 'subMenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $menu = 'Obat';
        $subMenu = 'Create';
        return view('admin.obat.create', compact( 'suppliers','menu', 'subMenu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'expired' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'id_supplier' => 'required',
        ]);

        $simpan = Obat::create($validate);
        if ($simpan) {
            return response()->json(['message' => 'Data Berhasil Ditambahkan']);
        } else{
            return response()->json(['message' => 'Data gagal Ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
