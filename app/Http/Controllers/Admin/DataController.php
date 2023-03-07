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
        $cutis = Cuti::orderBy('nama_cuti', 'ASC');
        return datatables()->of($cutis)
            ->editColumn(
                'cover',
                function (Cuti $model) {
                    return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
                }
            )
            ->addColumn('action', 'admin.cuti.action')
            ->addIndexColumn() // membuat no urut
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }

    // public function cuti()
    // {
    //     $cutis = Cuti::orderBy('nama_cuti', 'ASC');
    //     return datatables()->of($cutis)
    //         ->editColumn(
    //             'cover',
    //             function (Cuti $model) {
    //                 return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
    //             }
    //         )
    //         ->addColumn('action', 'admin.cuti.action')
    //         ->addIndexColumn() // membuat no urut
    //         ->rawColumns(['cover', 'action'])
    //         ->toJson();
    // }

    public function provinsi()
    {
        $provinsis = Provinsi::orderBy('nama_provinsi', 'ASC');
        return datatables()->of($provinsis)
            // ->editColumn(
            //     'cover',
            //     function (Karyawan $model) {
            //         return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
            //     }
            // )
            ->addColumn('action', 'admin.provinsi.action')
            ->addIndexColumn() // membuat no urut
            ->rawColumns(['action'])
            ->toJson();
    }

}
