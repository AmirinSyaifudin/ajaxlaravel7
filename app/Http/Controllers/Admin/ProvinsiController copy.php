<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Provinsi;
use DataTables;
use Validator;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinsi = Provinsi::orderBy('created_at', 'DESC');

        if ($request->ajax() ) 
        {
            $data = Provinsi::latest()->get();

            return datatables::of($provinsi)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                        data-id="' . $row->provinsi_id . '" 
                        data-title="' . $row->nama_provinsi . '" 
                        data-date="' . $row->tanggal_jadi_provinsi . '" 
                        data-keterangan="' . $row->keterangan . '" 
                        data-original-title="Edit" 
                        class="edit btn btn-primary btn-sm editProvinsi">EDIT</a>';

                    $btn = $btn . ' 
                        <a href="javascript:void(0)" data-toggle="tooltip"  
                            data-provinsi_id="' . $row->provinsi_id . '" 
                            data-original-title="Delete" 
                            class="btn btn-danger btn-sm deleteProvinsi">DETELE
                        </a>'
                        ;

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        // $validator = Validator::make($request->all(), [
        //     'nama_provinsi'          => 'required',
        //     'keterangan'             => 'required',
        //     'tanggal_jadi_provinsi'  => 'required',
        //     'image'                  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        Provinsi::updateOrCreate(
            [
                'provinsi_id'   => $request->provinsi_id
            ],
            [
                'nama_provinsi'          => $request->nama_provinsi,
                'tanggal_jadi_provinsi'  => $request->tanggal_jadi_provinsi,
                'keterangan'             => $request->keterangan
            ]
        );

        return response()->json(['success' => 'Provinsi Berhasil Di tambahkan !!!']);
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
    public function edit($provinsi_id)
    {
        $provinsi = Provinsi::find($provinsi_id);
     
        return response()->json($provinsi);
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
        $edit = DB::table('provinsi')
            ->where('provinsi_id', $request->id)
            ->update([
                'nama_provinsi'          => $request->nama_provinsi,
                'tanggal_jadi_provinsi'  => $request->tanggal_jadi_provinsi,
                'keterangan'             => $request->keterangan,
            ]);

        return response()->json(['success' => 'Provinsi Berhasil Di Update !!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Provinsi::where('provinsi_id', $request->id)->delete();

        return response()->json(['success' => 'Provinsi deleted successfully.']);
        // return response()->json([
        //     'status' => true,
        //     'info'   => "Success"
        // ], 201);

    }
}




    //     public function destroy(Request $request)
    // {
    //     Provinsi::where('provinsi_id', $request->id)->delete();

    //     return response()->json(['success' => 'Provinsi deleted successfully.']);
    // }