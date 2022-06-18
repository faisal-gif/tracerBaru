<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class userImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            User::create([
            'id' => (string)$row['nim'],
            'email' => (string)$row['nim'],
            'password' => md5($row['nim']),
            'name' => $row['nama'],
            'roles' => 'alumni',
        ]);
        }
    }
}
