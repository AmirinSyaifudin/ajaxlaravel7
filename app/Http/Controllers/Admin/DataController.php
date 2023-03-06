<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;
use App\Provinsi;
use App\Kota;
use App\Kabupaten;
use App\Pasien;
use App\Cuti;
use Illuminate\Support\Facades\DB;
use DataTables;

class DataController extends Controller
{
    //KABUPATEN
    // public function kabupaten()
    // {
    //     // $kabupatens = kabupaten::orderBy('keterangan', 'ASC');
    //     $kabupaten = DB::table('kabupaten')
    //         ->join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.provinsi_id')
    //         ->join('kota', 'kabupaten.kota_id', '=', 'kota.kota_id')
    //         ->select(
    //             'kabupaten.nama_kabupaten',
    //             'kota.nama_kota',
    //             'provinsi.nama_provinsi',
    //             'kabupaten.kode_pos',
    //             'kabupaten.keterangan',
    //         )
    //         ->orderBy('kabupaten.nama_kabupaten', 'ASC')
    //         ->get();

    //     return datatables()->of($kabupaten)
    //         ->addColumn('action', 'admin.kabupaten.action')
    //         ->addIndexColumn()
    //         ->rawColumns(['action'])
    //         ->toJson();
    // }

    public function karyawan()
    {
        $karyawans = Karyawan::orderBy('nama', 'ASC');
        return datatables()->of($karyawans)
            ->editColumn(
                'cover',
                function (Karyawan $model) {
                    return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
                }
            )
            ->addColumn('action', 'admin.karyawan.action')
            ->addIndexColumn() // membuat no urut
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }

    public function cuti()
    {
        // $cutis = Cuti::orderBy('keterangan', 'ASC');
        $cutis = DB::table('cuti')
            ->join('karyawan', 'cuti.karyawan_id', '=', 'karyawan.karyawan_id')
            ->select(
                'cuti.*',
                'karyawan.nama'
            )
            ->orderBy('karyawan.nama', 'ASC')
            ->get();

        return datatables()->of($cutis)
            ->addColumn('action', 'admin.cuti.action')
            ->addIndexColumn()
            ->toJson();
    }

}
