<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Bis;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ElseIf_;

class BisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($jenis);
        //dd($request->all());
        $bis = DB::table('bis')->get();

        return view('admin.bis.index', compact('bis'));
        // return view('admin.bis.index', compact('jumlah', 'bis', 'jenis_bis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //if (isset($request->jumlah)) {
        $jumlah = (int)$request->jumlah;

        if ($jumlah <= 12) {
            $jenis = 'Mini Bus';
            $napol = 'AB 123 Jogja';
            $warna = 'Merah';
            $nama_sopir = 'Riki Ayub';
            $nama_kondektur = 'Febri';
        } elseif ($jumlah >= 13 && $jumlah <= 24) {
            $jenis = 'Medium Bus';
            $napol = 'AB 456 Sleman';
            $warna = 'Hitam Doft';
            $nama_sopir = 'Majid';
            $nama_kondektur = 'Muthi';
        } elseif ($jumlah >= 25 && $jumlah <= 50) {
            $jenis = 'Big Bus';
            $napol = 'AB 789 Bantul';
            $warna = 'Biru Dongker';
            $nama_sopir = 'Arif Babe';
            $nama_kondektur = 'Ade Oyea';
        } elseif ($jumlah >= 50 && $jumlah <= 70) {
            $jenis = 'Big Bus Level 1';
            $napol = 'AB 001 Bantul';
            $warna = 'Putih Ferari';
            $nama_sopir = 'Yoga Jangkrik';
            $nama_kondektur = 'Kuwe Gatel';
        }
        if ($jumlah > 70) {
            return redirect('admin/bis')->with('info', 'Sistem Menolak, Data Penumpang terlalu banyak !!!');
        }

        DB::table('bis')
            ->insert([
                'jumlah'          => $request->jumlah,
                'jenis_bis'       => $jenis,
                'napol'           => $napol,
                'warna'           => $warna,
                'nama_sopir'      => $nama_sopir,
                'nama_kondektur'  => $nama_kondektur,
            ]);

        return redirect('admin/bis')
            ->with('sukses', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bis_id)
    {
        //
        $bis  = DB::table('bis')
            ->where('bis_id', $bis_id)
            ->first();

        $data  = array(
            'bis'      => $bis
        );

        return view('admin.bis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $edit  = DB::table('bis')
            ->where('bis_id', $request->bis_id)
            ->update([
                'jumlah'       => $request->jumlah,
                'jenis_bis'    => $request->jenis_bis
            ]);

        if ($edit) {
            return redirect('admin/bis')
                ->with('sukses', 'Data berhasil di Update');
        } else {
            return redirect('admin/bis')
                ->with('error', 'Data tidak bisa di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bis_id)
    {
        //
        DB::table('bis')
            ->where('bis_id', $bis_id)
            ->delete();

        return redirect('admin/bis')
            ->with(['info' => 'Data Berhasil di Hapus']);
    }
}


// $jumlah = (int)$request->jumlah;
// if ($jumlah <= 12) {
//     $jenis = 'Mini Bus';
// } elseif ($jumlah >= 13 && $jumlah <= 24) {
//     $jenis = 'Medium Bus';
// } elseif ($jumlah >= 25 && $jumlah <= 50) {
//     $jenis = 'Big Bus';
// } else {
//     $jenis = 'Ora ketemu';
// }



// $jumlah = (int)$request->jumlah;

//         if ($jumlah <= 12) {
//             $jenis = 'Mini Bus';
//             $napol = 'AB 123 Jogja';
//             $warna = 'Merah';
//             $nama_sopir = 'Riki Ayub';
//             $nama_kondektur = 'Febri';
//         } elseif ($jumlah >= 13 && $jumlah <= 24) {
//             $jenis = 'Medium Bus';
//             $napol = 'AB 456 Sleman';
//             $warna = 'Hitam Doft';
//             $nama_sopir = 'Majid';
//             $nama_kondektur = 'Muthi';
//         } elseif ($jumlah >= 25 && $jumlah <= 50) {
//             $jenis = 'Big Bus';
//             $napol = 'AB 789 Bantul';
//             $warna = 'Biru Dongker';
//             $nama_sopir = 'Arif Babe';
//             $nama_kondektur = 'Ade Oyea';
//         } elseif ($jumlah >= 50 && $jumlah <= 70) {
//             $jenis = 'Big Bus Level 1';
//             $napol = 'AB 001 Bantul';
//             $warna = 'Putih Ferari';
//             $nama_sopir = 'Yoga Jangkrik';
//             $nama_kondektur = 'Kuwe Gatel';
//         } else {
//             $jenis = 'Ora ketemu';
//         }
