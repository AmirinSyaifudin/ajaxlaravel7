<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Jarakwaktu;
use Illuminate\Support\Facades\DB;

class JarakwaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $current = Carbon::now();

        $jarakwaktu = DB::table('jarakwaktu')
            ->select(
                'jarakwaktu.*',
                'jarakwaktu.kecepatan',
                'jarakwaktu.jarak',
                'jarakwaktu.waktu',
                'jarakwaktu.created_at'
                //'jarakwaktu.terbilang_waktu'
            )
            ->get();
        $data = array(
            'jarakwaktu'  => $jarakwaktu,
            //  'current'     => $current

        );
        return view('admin.jarakwaktu.index', $data);
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
        //
        DB::table('jarakwaktu')
            ->insert([
                // 'created_ad'         => $request->created_ad,
                // 'jam_berangkat'         => $request->jam_berangkat,
                'kecepatan'             => $request->kecepatan,
                'jarak'                 => $request->jarak,
                'waktu'                 => $request->jarak / $request->kecepatan,
                //  'terbilang_waktu'       => $request->terbilang_mulai,
            ]);

        return redirect('admin/jarakwaktu')
            ->with('sukses', 'Data Berhasil di tambahkan !!!');
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
    public function destroy($jarakwaktu_id)
    {
        //
        DB::table('jarakwaktu')
            ->where('jarakwaktu_id', $jarakwaktu_id)
            ->delete();

        return redirect('admin/jarakwaktu')
            ->with(['info'  => 'Data berhasil di Hapus']);
    }

    public function detail()
    {
        return view('admin.jarakwaktu.detail');
    }
}
