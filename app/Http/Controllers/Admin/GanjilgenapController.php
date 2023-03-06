<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Ganjilgenap;
use Illuminate\Support\Facades\DB;

class GanjilgenapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ganjilgenap = DB::table('ganjilgenap')->paginate(20);
        //dd($ganjilgenap);
        
        return view('admin.ganjilgenap.index', ['ganjilgenap' => $ganjilgenap]);
        //return view('admin.ganjilgenap.index', compact('ganjilgenap'));
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
        $napol = $request->napol;
        if (date('d') % 2 == 0) {
                $cek = 'genap';
            } else {
                $cek = 'ganjil';
            }

        //identifikasi karakter tidak boleh menggunakan spasi
        if (strpos($_POST['napol'], ' ') !== false) {
                // echo 'TIDAK BOLEH MENGGUNAKAN SPASI KAMPRET';
                return redirect('admin/ganjilgenap')
                    ->with(['info' => 'SISTEM MENOLAK, TIDAK BOLEH MENGGUNAKAN SPASI !!! HAHAHA']);
                 } else {
                        $napol = preg_replace('/([^0-9]+)/', '', $_POST['napol']);

                        // cek kondisi napol ganjil atau genap
                        if ($napol % 2 == 0) {
                                $ceknapol = 'genap';
                            } else {
                                $ceknapol = 'ganjil';
                            }

                            // cek kondisi kena tilang atau tidak 
                            if ($cek != $ceknapol) {
                                    $status = 'Anda Kena Tilang Rp.1.000.000';
                                } else {
                                    $status = 'Silahkan Lanjut Perjalanan Pak Haji';
                                }
                 }

        DB::table('ganjilgenap')
            ->insert([
                // 'tanggal_mulai'  => $request->tanggal_mulai,
                'napol'        => $request->napol,
                'status'       => $status,
            ]);

        return redirect('admin/ganjilgenap')
            ->with(['sukses' => 'data behasil di simpan']);
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
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ganjilgenap_id)
    {
        DB::table('ganjilgenap')
            ->where('ganjilgenap_id', $ganjilgenap_id)
            ->delete();

        return redirect('admin/ganjilgenap')
            ->with(['info' => 'Data brhasil di Hapus']);
    }
}
