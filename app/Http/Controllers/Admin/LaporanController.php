<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Produk;
use App\Karyawan;
use App\Cuti;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class LaporanController extends Controller
{
    public function topproduk()
    {
        $produk = DB::table('produk')
            ->join('katagori', 'produk.katagori_id', '=', 'katagori.katagori_id')
            ->select(
                'produk.*',
                'produk.nama_produk',
                'produk.qty',
                'produk.harga',
                'produk.keterangan',
                'produk.cover',
                'katagori.katagori_id',
                'katagori.nama_katagori'
            )
            ->orderBy('nama_produk', 'ASC')
            ->get();
        // dd($produk);
        $katagori = DB::table('katagori')->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
            'katagori'   => $katagori
        );
        return view('admin.laporan.top-produk', $data);
    }

    public function topuser()
    {
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.*',
                'transaksi.no_rekening',
                'transaksi.transfer',
                'users.id',
                'users.name',
                'users.email',
                'users.created_at'
            )
            ->groupBy('users.name')
            ->orderBy('name', 'ASC')
            ->get();
        $users      = DB::table('users')->get();

        $data = array(
            'transaksi'     => $transaksi,
            'users'         => $users
        );
        // dd($data);
        return view('admin.laporan.top-user', $data);
    }


    public function produkmahal()
    {
        $produk = DB::table('produk')
            ->select(
                'produk.nama_produk',
                'produk.qty',
                'produk.harga'
            )
            ->orderBy('harga', 'DESC')
            ->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
        );
        return view('admin.laporan.produkmahal', $data);
    }

    public function produkmurah()
    {
        $produk = DB::table('produk')
            ->select(
                'produk.nama_produk',
                'produk.qty',
                'produk.harga'
            )
            ->orderBy('harga', 'ASC')
            ->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
        );
        return view('admin.laporan.produkmurah');
    }

    public function tigakrw()
    {
        $karyawan = DB::table('karyawan')
            ->select(
                'karyawan.*',
                'karyawan.no_induk',
                'karyawan.nama',
                'karyawan.alamat',
                'karyawan.tanggal_lahir',
                'karyawan.tanggal_bergabung'
            )
            ->orderBy('tanggal_bergabung', 'ASC')
            ->limit(3)
            ->get();

        $data = array(
            'karyawan'  => $karyawan
        );

        return view('admin.laporan.tigakrw', $data);
    }

    public function cutikrw()
    {
        $cuti = DB::table('cuti')
            ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.karyawan_id')
            ->select(
                'cuti.*',
                'karyawan.karyawan_id',
                'karyawan.no_induk',
                'karyawan.nama',
                'cuti.tanggal_cuti',
                'cuti.keterangan'
            )
            ->orderBy('nama', 'ASC')
            ->get();

        $karyawan = DB::table('karyawan')->get();

        $data = array(
            'cuti'          => $cuti,
            'karyawan'      => $karyawan

        );

        return view('admin.laporan.cutikrw', $data);
    }

    public function cutilebihkrw()
    {
        $cuti = DB::table('cuti')
            ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.karyawan_id')
            // ->where('lama_cuti', 'BETWEEN', '2 and 10')
            ->where('lama_cuti', '>', 1)
            ->select(
                'cuti.*',
                'karyawan.karyawan_id',
                'karyawan.no_induk',
                'karyawan.nama',
                'cuti.tanggal_cuti',
                'cuti.keterangan'
            )
            ->orderBy('nama', 'ASC')
            ->get();

        $karyawan = DB::table('karyawan')->get();

        $data = array(
            'cuti'          => $cuti,
            'karyawan'      => $karyawan
        );

        return view('admin.laporan.cutilebihkrw', $data);
    }

    public function pengajuancuti(Request $request)
    {
        $tahun = $request->tahun ?? Carbon::now()->format('Y');

        $cuti = DB::table('cuti')->get();


        return view('admin.laporan.pengajuancuti');
    }

    public function sisacuti(Request $request)
    {
        $tahun = $request->tahun ?? Carbon::now()->format('Y');

        $cuti = DB::table('karyawan')->get();

        $return = array();
        foreach ($cuti as $r) {

            $getCuti = DB::table('cuti')
                ->where('karyawan_id', $r->karyawan_id)
                ->whereYear('tanggal_cuti', $tahun)
                ->sum('lama_cuti');
            $r->ambilcuti = $getCuti;
            $return[] = $r;
        }
        // dd($return);
        return view('admin.laporan.sisacuti', ['cuti' => $return]);

        // $cuti = DB::table('cuti')
        //     ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.karyawan_id')
        //     ->select(
        //         'cuti.*',
        //         'karyawan.karyawan_id',
        //         'karyawan.no_induk',
        //         'karyawan.nama',
        //         'cuti.tanggal_cuti',
        //         'cuti.keterangan'
        //     )
        //     ->orderBy('nama', 'ASC')
        //     ->get();

        //jika tanggal skarang sama dengan tanggal diterima
        // if(tanggal_hari_ini() == tanggal_masuk(){
        // jatah_cuti = jatah_cuti + 6;
        // }

        // $sisa_cuti      = 12;
        // $jumlah_cuti    = new Cuti();

        // $sisa_cuti_kyw = $sisa_cuti - $jumlah_cuti;

        // $data = array(
        //     'cuti'       => $cuti,
        //     //'no_induk'          => $cuti->no_induk,
        //     //'nama'              => $cuti->nama,
        //     //'sisa_cuti_kyw'     => $sisa_cuti_kyw->sisa_cuti,
        // );

        // return view('admin.laporan.sisacuti', $data);
    }

    public function hitungcuti()
    {
        $cuti = DB::table('cuti')
            ->join('karyawan', 'cuti.cuti_id', '=', 'karyawan.karyawan_id')
            ->select(
                'cuti.*',
                'karyawan.karyawan_id',
                'karyawan.no_induk',
                'karyawan.nama',
                'cuti.tanggal_cuti',
                'cuti.keterangan'
            )
            ->orderBy('nama', 'ASC')
            ->get();

        $karyawan = DB::table('karyawan')->get();

        $data = array(
            'cuti'          => $cuti,
            'karyawan'      => $karyawan
        );

        return view('admin.laporan.sisacuti', $data);
    }
}



// $sisaCuti = 10;

// $cutiDari = strtotime("2020/01/13");
// $cutiSampai = strtotime("2020/01/16");

// $timeDiff = abs($cutiSampai - $cutiDari );

// $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

// // and you might want to convert to integer
// $numberDays = intval($numberDays);

// $hasil = $sisaCuti - $numberDays;

// // query sql
// update pegawai set cuti = $hasil where id_pegawai = ?