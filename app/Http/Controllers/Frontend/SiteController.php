<?php

namespace App\Http\Controllers\Frontend;

use AdminUserSeeder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Produk;
use App\Kabupaten;
use App\Transaksi;
use App\Katagori;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    //
    public function home()
    {
        return view('frontend.templates.home');
    }

    public function homeapp()
    {
        return view('frontend.templates.homeapp');
    }


    public function kontak()
    {
        return view('frontend.templates.kontak');
    }


    public function eshopper()
    {
        return view('frontend.templates.homeapp');

        //   return view('frontend.templates.eshopper');
    }
}