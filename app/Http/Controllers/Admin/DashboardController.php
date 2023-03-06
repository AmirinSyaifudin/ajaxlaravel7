<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::all();
        // dd($produk);

        return view('admin.dashboard.index', $produk);
    }
}