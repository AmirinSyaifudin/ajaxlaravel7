<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Parkir;
use Illuminate\Support\Facades\DB;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = mktime(date("m"), date("d"), date("Y"));

        $parkir = DB::table('parkir')
            ->get();

        //$tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        // $now = Carbon::now()->isoFormat('dddd, D MMMM Y');
        //$diff = Carbon::now()->diff($parkir->tanggal_jam_masuk);

        $jenis_kendaraan = $request->jenis_kendaraan;
        $tarif_perjam    = $request->tarif_perjam;

        $thnBln = $now->year . $now->month;
        $cek = Parkir::count();
        if ($cek == 0) {
            $urut       = 100001;
            $nomer      = 'MTR-' . $thnBln . $urut;
        } else {
            $ambil      = Parkir::all()->last();
            $urut       = (int)substr($ambil->no_parkir, -6) + 1;
            $nomer      = 'MTR-' . $thnBln . $urut;
        }

        // dd($parkir);
        return view('admin.parkir.index', compact('tanggal', 'parkir', 'nomer', 'jenis_kendaraan', 'tarif_perjam'));
        // return view('admin.parkir.index', $data);
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
    public function HitungHari()
    {
    }
    public function HitungJam()
    {
    }
    public function HitungMenit()
    {
    }
    public function HitungBiaya()
    {
    }

    public function store(Request $request)
    {
        //

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = mktime(date("m"), date("d"), date("Y"));

        $jenis_kendaraan = $request->jenis_kendaraan;
        // $tarif_perjam    = $request->tarif_perjam;

        if ($jenis_kendaraan == 'SEPEDA') {
            $tarif_perjam = 500;
            $status = "AKTIF";
        } elseif ($jenis_kendaraan == 'MOTOR') {
            $tarif_perjam = 700;
            $status = "AKTIF";
        } elseif ($jenis_kendaraan == 'MOBIL') {
            $tarif_perjam = 1000;
            $status = "AKTIF";
        } elseif ($jenis_kendaraan == 'BIS') {
            $tarif_perjam = 1500;
            $status = "AKTIF";
        } elseif ($jenis_kendaraan == 'TRUK') {
            $tarif_perjam = 2000;
            $status = "AKTIF";
        }

        DB::table('parkir')
            ->insert([
                'tanggal_jam_masuk' => $request->tanggal_jam_masuk,
                'no_parkir'         => $request->no_parkir,
                // 'created_at'     => $request->created_at,
                'jenis_kendaraan'   => $jenis_kendaraan,
                'napol'             => $request->napol,
                'tarif_perjam'      => $tarif_perjam,
                'status'            => $status,
            ]);

        return redirect('admin/parkir')
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
    public function destroy($parkir_id)
    {
        //
        DB::table('parkir')
            ->where('parkir_id', $parkir_id)
            ->delete();

        return redirect('admin/parkir')
            ->with(['info' => 'Check Out Berhasil !!! ']);
    }



    public function checkout($parkir_id)
    {
        $parkir = DB::table('parkir')
            ->where('parkir_id', $parkir_id)
            ->first();
        // dd($parkir);
        $diff = Carbon::now()->diff($parkir->tanggal_jam_masuk);

        $jumlah = 0;
        if ($diff->d) {
            $jumlah += $diff->h * 60;
        }
        $jumlah += $diff->h;

        $total_bayar  = $jumlah * $parkir->tarif_perjam;
        // dd($total_bayar);
        // dd($jumlah * 2000);
        // dd($diff);
        $data = array(
            'parkir'      => $parkir,
            'diff'        => $diff,
            'total_bayar' => $total_bayar
        );

        return view('admin.parkir.checkout', $data);
        // return view('admin.parkir.checkuot', compact('parkir'));
    }
}

