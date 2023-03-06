<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Hitungparkir;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ElseIf_;

class HitungparkirController extends Controller
{
    //
    public function index()
    {
        $hitungparkir = DB::table('hitungparkir')->get();

        return view('admin.hitungparkir.index', compact('hitungparkir'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $jenis_kendaraan = $request->jenis_kendaraan;
        if ($jenis_kendaraan == 'SEPEDA') {
            $biaya_perjam = "Rp. 2000";
            $anda_parkir = "10 Hari";
            $keterangan     = "Terima kasih sayang sudah parkir dengan tertib";
        } elseif ($jenis_kendaraan == 'MOTOR') {
            $biaya_perjam = "Rp. 5000";
            $anda_parkir = "5 Hari";
            $keterangan     = "Terima kasih sayang sudah parkir dengan tertib";
        } elseif ($jenis_kendaraan == 'MOBIL') {
            $biaya_perjam = "Rp. 10.000";
            $anda_parkir = "3 Hari";
            $keterangan     = "Terima kasih sayang sudah parkir dengan tertib";
        } elseif ($jenis_kendaraan == 'BIS') {
            $biaya_perjam = "Rp. 15.000";
            $anda_parkir = "4 Hari";
            $keterangan     = "Terima kasih sayang sudah parkir dengan tertib";
        } elseif ($jenis_kendaraan == 'TRUK') {
            $biaya_perjam = "Rp. 20.000";
            $anda_parkir = "7 Hari";
            $keterangan     = "Terima kasih sayang sudah parkir dengan tertib";
        }

        DB::table('hitungparkir')
            ->insert([
                'jenis_kendaraan'     => $request->jenis_kendaraan,
                'biaya_perjam'         => $biaya_perjam,
                'anda_parkir'         => $anda_parkir,
                'keterangan'         => $keterangan,
            ]);

        return redirect('admin/hitungparkir')->with('info', 'Databerhasil di tambahkan !!! ');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy($hitungparkir_id)
    {
        DB::table('hitungparkir')
            ->where('hitungparkir_id', $hitungparkir_id)
            ->delete();

        return redirect('admin/hitungparkir')
            ->with('sukses', 'Data berhasil di hapus !!! ');
    }
}
