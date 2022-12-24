<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class PageController extends Controller
{
    public function katalog() {
        $produk = Produk::all();
        return view('katalog', compact('produk'));
    }

    public function detail($id) {
        $produk = Produk::find($id);
        return view('detail', compact('produk'));
    }

    public function laporan() {
        return view('laporan');
    }
}
