<?php

namespace App\Imports;

use App\dataAlumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class dataAlumniImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            dataAlumni::create([
                'nim' => (string)$row['nim'],
                'nama' => $row['nama'],
                'prodi' =>$row['prodi'],
                'tahunLulus' => (string) $row['tahun_lulus'],
                'jk' => $row['jenis_kelamin'],
            ]);
        }
    }
}
