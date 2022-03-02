<?php

namespace App\Imports;

use App\Models\Collection as ModelsCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CollectionsImport implements ToCollection, WithStartRow
{
    public function startRow(): int{
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $inventory_code = $row[0]. "" .$row[1];
            $b64_pdf = $row[23];
            // $bin = base64_decode($b64_pdf);
            // if (strpos($bin, '%PDF') !== 0) {
            //     return redirect('/admin/collections')->with('error',"PDF Signature not found");
            // }
            
            // $path = Storage::putFileAs('public/files/ebooks', $bin, $inventory_code);
            $pathName = Str::random(10).'.'.'pdf';
            $path = Storage::disk('collections')->put($pathName, base64_decode($b64_pdf, true));

            ModelsCollection::create([
                'inventory_code' => $inventory_code, //v
                'title'    => $row[2], //v
                'subtitle'    => $row[3], //v
                'languange_id'    => $row[5], //v
                'classification'    => $row[10], //v
                'author_code'    => $row[11], //v
                'title_code'    => $row[12], //v
                'volume'    => $row[13], //v
                'edition'    => $row[14], //v
                'publisher_id'    => $row[16], //v
                'publish_year'    => $row[17], //v
                'procurement_id'    => $row[18], //v
                'year_of_procurement'    => $row[19], //v
                'price'    => $row[20], //v
                'collation'    => $row[21], //v
                'isbn_issn_doi'    => $row[22], //v
                'abstract'    => $row[23],
                'publish_city'    => null, //v
                'path_cover'    => null,
                'path_file'    => $path,
                'type_id'    => null, 
                'author_id'    => null, 
            ]);
        }
    }
    // public function model(array $row)
    // {
    //     $inventory_code = $row[0]. "" .$row[1];
    //     $b64_pdf = $row[23];
    //     // $bin = base64_decode($b64_pdf);
    //     // if (strpos($bin, '%PDF') !== 0) {
    //     //     return redirect('/admin/collections')->with('error',"PDF Signature not found");
    //     // }
        
    //     // $path = Storage::putFileAs('public/files/ebooks', $bin, $inventory_code);
    //     $pathName = Str::random(10).'.'.'pdf';
    //     $path = Storage::disk('collections')->put($pathName, base64_decode($b64_pdf, true));

    //     return new Collection([
    //         'inventory_code' => $inventory_code, //v
    //         'title'    => $row[2], //v
    //         'subtitle'    => $row[3], //v
    //         'languange_id'    => $row[5], //v
    //         'classification'    => $row[10], //v
    //         'author_code'    => $row[11], //v
    //         'title_code'    => $row[12], //v
    //         'volume'    => $row[13], //v
    //         'edition'    => $row[14], //v
    //         'publisher_id'    => $row[16], //v
    //         'publish_year'    => $row[17], //v
    //         'procurement_id'    => $row[18], //v
    //         'year_of_procurement'    => $row[19], //v
    //         'price'    => $row[20], //v
    //         'collation'    => $row[21], //v
    //         'isbn_issn_doi'    => $row[22], //v
    //         'abstract'    => null,
    //         'publish_city'    => null, //v
    //         'path_cover'    => null,
    //         'path_file'    => $path,
    //         'type_id'    => null, 
    //         'author_id'    => null, 
    //     ]);
    //     // row[0] == accno / inventory_code
    //     // row[1] == ket_inventaris / inventory_code
    //     // row[2] == judul / title
    //     // row[3] == anak judul / subtitle
    //     // row[4] == subject
    //     // row[5] == bahasa / language
    //     // row[6] == status_pengarang
    //     // row[7] == pengarang
    //     // row[8] == penerjemah
    //     // row[9] == editor
    //     // row[10] == kode_klass / classification
    //     // row[11] == kode_pengarang
    //     // row[12] == kode_judul / title_code
    //     // row[13] == jilid / volume
    //     // row[14] == edisi / edition
    //     // row[15] == kota / publish_city
    //     // row[16] == penerbit / publisher
    //     // row[17] == tahun / publish_year
    //     // row[18] == asal / procurement_id
    //     // row[19] == tahun_pengadaaan / year_of_procurement
    //     // row[20] == harga / price
    //     // row[21] == kolasi / collation
    //     // row[22] == isbn / isbn|issn|doi
    // }
}
