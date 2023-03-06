<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping; // add
use Maatwebsite\Excel\Concerns\WithHeadings; // add 

class KaryawanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Karyawan::all();
    }

    // modifikasi kolom excel yang ingin di tampilkan 
    public function map($karyawan): array
    {
        return [
          $karyawan->no_induk,
          $karyawan->nama,
          $karyawan->alamat,
          $karyawan->tanggal_lahir,
          $karyawan->tanggal_bergabung,
        ];
    }

    public function headings(): array
    {
        return [
            'NO INDUK',
            'NAMA LENGKAP',
            'ALAMAT',
            'TANGGAL LAHIR',
            'TANGGAL BERGABUNG',
        ];
    }

}
