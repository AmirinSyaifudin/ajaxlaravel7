<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    //  setelah login kembali ke tampilan laravel
    public function index()
    {

        // pertemuenak ke 43 memampilkan data
        // auth() artinya user yang sedang login itu siapa
        // user() artinya ambil data user
        // borrow artinya ambil relasinya
        // $produk = auth()->user()->transaksi; // mengambil data buku apa saja yang sudah di pinjam pleh user
        //  dd($produk);

        return view('home');

        // return view('home', [
        //     'produk'    => $produk,
        // ]);
    }

    // public function index()
    // {
    //     return view('frontend.templates.homeapp');
    // }
}