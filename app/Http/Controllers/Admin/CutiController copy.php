<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
                $cutis = Cuti::orderBy('nama_cuti','ASC');
        
                return datatables::of($cutis)
                ->editColumn('cover', function ($row) {
                    return '<img with="80" height="80" src="' . url('assets/covers/', $row->cover) . '">';
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                })
                ->rawColumns(['action','cover'])
                ->toJson();
                exit();
            }
    
        return view('admin.cuti.index');
    }

    // public function index()
    // {
    //     $cuti = DB::table('cuti')
    //         ->select(
    //             'cuti.cuti_id',
    //             'cuti.cover',
    //             'cuti.nama_cuti',
    //             'cuti.tanggal_cuti',
    //             'cuti.tanggal_selesai_cuti',
    //             'cuti.keterangan',
    //             'cuti.lama_cuti',
    //         )
    //         ->orderBy('nama_cuti', 'ASC')
    //         ->get();

    //     $data = array(
    //         'cuti'       => $cuti,
    //     );
    
    //     return view('admin.cuti.index', $data);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuti = DB::table('cuti')
            ->select(
                'cuti.nama_cuti',
                'cuti.keterangan',
                'cuti.tanggal_cuti',
                'cuti.tanggal_selesai_cuti',
                'cuti.lama_cuti',
            )
            ->get();

        $data = array(
            'cuti'          => $cuti,
        );
        //  dd($cuti);
        return view('admin.cuti.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_cuti'             => 'required|min:2',
            'keterangan'            => 'required|min:2',
            'tanggal_cuti'          => 'required',
            'tanggal_selesai_cuti'  => 'required',
            'lama_cuti'             => 'required|numeric',
        ]);

        //upload cover 
        if ($request->cover) {
            $name = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/covers/'), $name);
        }

        DB::table('cuti')
            ->insert([
                'nama_cuti'             => $request->nama_cuti,
                'keterangan'            => $request->keterangan,
                'tanggal_cuti'          => $request->tanggal_cuti,
                'tanggal_selesai_cuti'  => $request->tanggal_selesai_cuti,
                'lama_cuti'             => $request->lama_cuti,
                'cover'                 => $name,
            ]);

        return redirect('/admin/cuti')
            ->with('sukses', 'Data Berhasil Di tambahkan !!!');
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
    public function edit($cuti_id)
    {
        $cuti = DB::table('cuti')
            ->where('cuti_id', $cuti_id)
            ->first();
        $data = array(
            'cuti'          => $cuti
        );
        return view('admin.cuti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_cuti'             => 'required|min:2',
            'keterangan'            => 'required|min:2',
            'tanggal_cuti'          => 'required',
            'tanggal_selesai_cuti'  => 'required',
            'lama_cuti'             => 'required|numeric',
        ]);

        if ($request->cover) {
            $name = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/covers/'), $name);
        }

        DB::table('cuti')
            ->where('cuti_id', $request->cuti_id)
            ->update([
                'nama_cuti'             => $request->nama_cuti,
                'keterangan'            => $request->keterangan,
                'tanggal_cuti'          => $request->tanggal_cuti,
                'tanggal_selesai_cuti'  => $request->tanggal_selesai_cuti,
                'lama_cuti'             => $request->lama_cuti,
                'cover'                 => $name,
            ]);

        return redirect('admin/cuti')
            ->with('info', 'Data Berhasil Di Update !!! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cuti_id)
    {
        DB::table('cuti')->where('cuti_id', $cuti_id)->delete();

        return redirect('admin/cuti')->with(['sukses' => 'Data telah dihapus']);
    }


    public function detail($cuti_id)
    {
        $cuti = DB::table('cuti')
            ->where('cuti_id', $cuti_id)
            ->first();

        $data = array(
            'cuti'   => $cuti
        );
        return view('admin.cuti.detail', $data);
    }
}



// return DataTables::of($query)
// ->addColumn('action', 'admin.cuti.action')
// //->editColumn()
// // ->addColumn('') // mengarah ke action.blade.php
// ->addIndexColumn() // tambah colom
// // ->addIndexColumn() // tambah colom
// // ->addIndexColumn() // tambah colom
// ->rawColumns(['action'])
// ->toJson();



// public function GETdata(Request $request)
// {
//     // $query = DB::table('cuti')
//     //     ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.id')
//     //     ->select(
//     //         'cuti.cuti_id',
//     //         'cuti.keterangan',
//     //         'cuti.tanggal_cuti',
//     //         'cuti.tanggal_selesai_cuti',
//     //         'karyawan.id'
//     //     )
//     //     ->get();

//     // $query = Cuti::with('karyawan')->orderBy('tanggal_cuti', 'ASC')->get();

//     // $query->load('karyawan');

//     $query = DB::table('cuti');
//     // $query = DB::table('cuti')
//     //     ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.id');
//     //      ->get();

//     return DataTables::of($query)
//         ->addColumn('action', 'admin.cuti.action')
//         //  ->addIndexColumn() // tambah colom
//         ->addIndexColumn() // tambah colom
//         ->rawColumns(['action'])
//         ->toJson();
// }