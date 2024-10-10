<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        $menu = 'Supplier';
        $subMenu = 'Index';
        return view('admin.supplier.index', compact('suppliers', 'menu', 'subMenu'));
    }

    public function create()
    {
        $menu = 'Supplier';
        $subMenu = 'Create';
        return view('admin.supplier.create', compact( 'menu', 'subMenu'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'perusahaan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $simpan = Supplier::create($validate);
        if ($simpan) {
            return response()->json(['message' => 'Data Berhasil Ditambahkan']);
        } else{
            return response()->json(['message' => 'Data gagal Ditambahkan']);
        }
    }
}
