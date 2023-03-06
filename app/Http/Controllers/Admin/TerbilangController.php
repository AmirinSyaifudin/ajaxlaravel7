<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;
use App\Terbilang;
use Illuminate\Support\Facades\DB;


class TerbilangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terbilang = DB::table('terbilang')->get();
        $tanggal = Carbon::now()->format('Y-m-d');
        // membuat no otomatis , tahun, bulan , no urut NT2021410000001 
        $now = Carbon::now();
        //$thnBulan = $now->year . $now->month . $now->date;
        $thnBulan = $now->year . $now->month;
        $cek = Terbilang::count();
        // cek kondisi, jika databse base kosong mulai dari $urut 001
        if ($cek == 0) {
            $urut   = 10000001;
            $nomer  = 'NT' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            //echo 'sdes';
            $ambil = Terbilang::all()->last();
            $urut = (int)substr($ambil->code_barang, -8) + 1;
            //menggabunggakn th bulang urut
            $nomer  = 'NT' . $thnBulan . $urut;
            // terbilang
            // $fungsiterbilang = ucwords(terbilang($total));
        }
        // dd($cek);
        // return view('admin.terbilang.index', compact('tanggal', 'terbilang', 'nomer', 'fungsiterbilang'));
        return view('admin.terbilang.index', compact('tanggal', 'terbilang', 'nomer'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.terbilang.create');
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
        // $qty        = ["qty"];
        // $harga      = ["harga"];
        // $total      = $qty * $harga;

        DB::table('terbilang')
            ->insert([
                // 'tanggal'       => $request->tanggal,
                'code_barang'   => $request->code_barang,
                'nama_barang'   => $request->nama_barang,
                'qty'           => $request->qty,
                'harga'         => $request->harga,
                'total'         => $request->qty * $request->harga,

            ]);

        return redirect('admin/terbilang')
            ->with('sukses', 'Data berhasil di Tambahkan');
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
    public function edit($terbilang_id)
    {
        //
        $terbilang  = DB::table('terbilang')
            ->where('terbilang_id', $terbilang_id)
            ->first();

        $data  = array(
            'terbilang'      => $terbilang
        );

        return view('admin.terbilang.edit', $data);
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
        $edit =  DB::table('terbilang')
            ->where('terbilang_id', $request->terbilang_id)
            ->update([
                'code_barang'       => $request->code_barang,
                'nama_barang'       => $request->nama_barang,
                'qty'               => $request->qty,
                'harga'             => $request->harga,
                'total'             => $request->qty * $request->harga
            ]);

        if ($edit) {
            return redirect('admin/terbilang')
                ->with('sukses', 'Data Berhasil di Update !!!');
        } else {
            return redirect('admin/terbilang')
                ->with('error', 'Data tidak terbilanga di Update !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($terbilang_id)
    {
        //
        DB::table('terbilang')
            ->where('terbilang_id', $terbilang_id)
            ->delete();

        return redirect('admin/terbilang')
            ->with(['info' => 'Data Berhasil di Hapus']);
    }

    public function detail($terbilang_id)
    {
        $terbilang = DB::table('terbilang')->get();
        //
        // $terbilang = DB::table('terbilang')->where('terbilang_id', $terbilang_id)->first();


        // dd($terbilang_id);
        // return view('admin.terbilang.detail');
        return view('admin.terbilang.detail', compact('terbilang'));
    }
}





   // if (isset($_POST['hitung'])) {
        //     $tanggal        = $_POST['tanggal'];
        //     $code_barang    = $_POST['code_barang'];
        //     $nama_barang    = $_POST['nama_barang'];
        //     $qty            = $_POST['qty'];
        //     $harga          = $_POST['harga'];
        //     $total          = $_POST['terbilang'];
        //     $terbilang      = $_POST['terbilang'];


        //     $now            = $qty * $harga;
        //     $terbilang      = ucwords(terbilang($total));
        // }



        // $mytime = Carbon\Carbon::now();
        //   $date = Carbon::now()->toDateTimeString();



            //validasi form 
        // $this->validate($request, [
        //     'tanggal'               => 'required|unique:karyawan',
        //     'code_barang'           => 'required',
        //     'nama_barang'           => 'required',
        //     'qty'                   => 'required',
        //     'harga'                 => 'required',
        //     'total'                 => 'required',
        //     'terbilang'             => 'required',
        //     'created_at'            => 'required',
        // ]);