<?php

namespace App\Imports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\ToModel;

class AuthorImport implements ToModel
{
    public function startRow(): int{
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Author([
            'firstname' => $row[0],
            'lastname' => $row[1],
        ]);
    }
}
