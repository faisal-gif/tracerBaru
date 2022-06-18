<?php

namespace App\Imports;

use App\biodata;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class alumniImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            biodata::create([
                'nim' => (string)$row['nim'],
                'nama' => $row['nama'],
                'noHp' => $row['no_hp'],
                'kotaLahir' => $row['kota_lahir'],
                'jk' => $row['jenis_kelamin'],
                'tanggalLahir' => $row['tanggal_lahir'],
                'prodi' => $row['prodi'],
                'tahunLulus' => $row['tahun_lulus'],
                'alamat' => $row['alamat'],
                'kodePos' => $row['kode_pos'],
                'provinsi' => $row['provinsi'],
                'kota' => $row['kota'],
                'email' => $row['email'],
                'pekerjaan' => $row['pekerjaan'],
                'jp' => $row['jenis_pekerjaan'],
                'namaPerusahaan' => $row['nama_perusahaan'],
                'alamatPerusahaan' => $row['alamat_perusahaan'],
                'status' => 'subscribe',

            ]);
        }
    }
}
