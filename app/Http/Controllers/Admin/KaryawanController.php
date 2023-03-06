<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Upload_file;
use Darryldecode\Cart\Validators\Validator as ValidatorsValidator;
use DataTables;
use PDF;
// use Redirect, Response, DB;
use File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = Karyawan::select(
                'karyawan.karyawan_id',
                'karyawan.no_induk',
                'karyawan.nama',
                'karyawan.email',
                'karyawan.jenis_kelamin',
                'karyawan.image',
                'karyawan.alamat',
                'karyawan.created_at',
                'karyawan.tanggal_lahir',
                'karyawan.tanggal_bergabung',
                'cuti.cuti_id',
                'cuti.nama_cuti',
            )
                ->join('cuti', 'karyawan.cuti_id', '=', 'cuti.cuti_id')
                ->orderBy('created_at', 'desc');

            return datatables::of($data)
                ->editColumn('image', function ($row) {
                    return '<img with="80" height="80" src="' . url('assets/covers/', $row->image) . '">';
                })
                ->addColumn('action', function ($row) {

                    // DETAIL
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                        data-id="' . $row->karyawan_id . '" 
                        data-no_ind="' . $row->no_induk . '"  
                        data-title="' . $row->nama . '"   
                        data-email_oke="' . $row->email . '"  
                        data-jenis_kelaminid="' . $row->jenis_kelamin . '" 
                        data-date="' . $row->tanggal_lahir . '"
                        data-date="' . $row->tanggal_bergabung . '"
                        data-alamat="' . $row->alamat . '" 
                    data-original-title="Detail" class="detail btn btn-info btn-sm detailKaryawan">DETAIL</a>';

                    //EDIT
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                        data-id="' . $row->karyawan_id . '" 
                        data-no_ind="' . $row->no_induk . '"  
                        data-title="' . $row->nama . '"   
                        data-email_oke="' . $row->email . '"  
                        data-jenis_kelaminid="' . $row->jenis_kelamin . '" 
                        data-date="' . $row->tanggal_lahir . '"
                        data-date="' . $row->tanggal_bergabung . '"
                        data-alamat="' . $row->alamat . '" 
                    data-original-title="Edit" class="edit btn btn-primary btn-sm editKaryawan">EDIT</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  
                        data-karyawan_id="' . $row->karyawan_id . '" 
                        data-original-title="Delete" 
                        class="btn btn-danger btn-sm deleteKaryawan">DETELE</a>';

                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->toJson();
            exit();
        }

        $cuti = Cuti::all();

        // $karyawan = DB::table('karyawan')
        //     ->join('cuti', 'karyawan.cuti_id', '=', 'cuti.cuti_id')
        //     ->select(
        //         'karyawan.karyawan_id',
        //         'karyawan.no_induk',
        //         'karyawan.nama',
        //         'karyawan.email',
        //         'karyawan.jenis_kelamin',
        //         'karyawan.image',
        //         'karyawan.alamat',
        //         'karyawan.tanggal_lahir',
        //         'karyawan.tanggal_bergabung',
        //         'cuti.cuti_id',
        //         'cuti.nama_cuti',
        //     )
        //     // ->orderBy('nama', 'ASC')
        //     ->get();

        return view('admin.karyawan.index', compact('cuti'));
        // return view('admin.karyawan.index', compact('karyawan', 'cuti'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'no_induk'            => 'required',
        //         'nama'                => 'required',
        //         'email'               => 'required',
        //         'jenis_kelamin'       => 'required',
        //         'image'               => 'required|image|mimes:png,jpg|max:2048',
        //         'alamat'              => 'required',
        //         'tanggal_lahir'       => 'required',
        //         'tanggal_bergabung'   => 'required',
        //     ]
        // );

        //  dd($request->all());
        $cuti = Cuti::all();

        $karyawan = new Karyawan;
        $karyawan->no_induk      = $request->input('no_induk');
        $karyawan->nama          = $request->input('nama');
        $karyawan->cuti_id       = $request->input('cuti_id');
        $karyawan->email         = $request->input('email');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->alamat        = $request->input('alamat');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');

        if ($request->hasFile('image')) {
            $file  = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/covers/', $filename);
            $karyawan->image = $filename;
        }

        $karyawan->save();

        return response()->json(['success'  => 'Karyawan berhasil di tambhakan !!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($karyawan_id)
    {
        $karyawan = DB::table('karyawan')
            ->where('karyawan_id', $karyawan_id)
            ->first();

        return response()->json($karyawan);
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
        $filename = '';
        if ($request->hasFile('image')) {
            $file  = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/covers/', $filename);
        }

        DB::table('karyawan')
            ->where('karyawan_id', $request->id)
            ->update([
                'no_induk'          => $request->no_induk,
                'nama'              => $request->nama,
                'cuti_id'           => $request->cuti_id,
                'email'             => $request->email,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'tanggal_bergabung' => $request->tanggal_bergabung,
                'alamat'            => $request->alamat,
                'image'             => $filename
            ]);

        return response()->json(['success' => 'Karyawan Berhasil di Update !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Karyawan::where('karyawan_id', $request->id)->delete();

        return response()->json(['success' => 'Karyawan berhasil di hapus !!!']);
    }

    public function detail(Request $request, $karyawan_id)
    {
        // $karyawan = DB::table('karyawan')
        //     ->where('karyawan_id', $karyawan_id)
        //     ->first();
        Karyawan::where('karyawan_id', $request->id)->delete();

        return response()->json()(['success' => 'Karyawan berhasil di hapus !!!']);
    }

    //excel 
    public function exportExcel()
    {
        return Excel::download(new KaryawanExport, 'karyawan.xlsx');
    }

    //PDF
    public function exportPdf()
    {
        $karyawan = \App\Karyawan::all();
        $pdf = PDF::loadView('admin.export.karyawanpdf', ['karyawan' => $karyawan]);
        return $pdf->download('karyawan.pdf');
    }
}