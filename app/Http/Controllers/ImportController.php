<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\SubjectsImport;
use App\Imports\CollectionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function import($import)
    {
        try {
            if($import == 'subject'){
                Excel::import(new SubjectsImport, request()->file('file'));
                return redirect()->back()->with('success','Data Imported Successfully');
            }elseif($import == 'language'){
                
            }elseif($import == 'type'){

            }elseif($import == 'author'){

            }elseif($import == 'publisher'){

            }elseif($import == 'procurement'){

            }elseif($import == 'collections'){
                $filedata = file_get_contents(request()->file('file'));
                $details = json_decode($filedata);
                $details[1]->publisher_id;
                foreach ($details as $row) 
                {
                    $b64_pdf = utf8_decode($row->base64file);

                    $inventory_code = addslashes($row->inventory_code);
                    $pathName = Str::random(10).'.'.'pdf';
                    $path = Storage::disk('collections')->put($pathName, base64_decode($b64_pdf, true));
        
                    Collection::create([
                        'inventory_code' => $row->inventory_code, //v
                        'title'    => empty($row->title) ? NULL : $row->title, //v
                        'subtitle'    => empty($row->subtitle) ? NULL : $row->subtitle, //v
                        'languange_id'    => empty($row->languange_id) ? NULL : $row->languange_id, //v
                        'classification'    => empty($row->classification) ? NULL : $row->classification, //v
                        'author_code'    => empty($row->author_code) ? NULL : $row->author_code, //v
                        'title_code'    => empty($row->title_code) ? NULL : $row->title_code, //v
                        'volume'    => empty($row->volume) ? NULL : $row->volume, //v
                        'edition'    => empty($row->edition) ? NULL : $row->edition, //v
                        'publisher_id'    => empty($row->publisher_id) ? NULL : $row->publisher_id, //v
                        'publish_year'    => empty($row->publish_year) ? NULL : $row->publish_year, //v
                        'procurement_id'    => empty($row->procurement_id) ? NULL : $row->procurement_id, //v
                        'year_of_procurement'    => empty($row->year_of_procurement) ? NULL : $row->year_of_procurement, //v
                        'price'    => empty($row->price) ? NULL : $row->price, //v
                        'collation'    => empty($row->collation) ? NULL : $row->collation, //v
                        'isbn_issn_doi'    => empty($row->isbn_issn_doi) ? NULL : $row->isbn_issn_doi, //v
                        'abstract'    => empty($row->abstract) ? NULL : $row->abstract,
                        'publish_city'    => null, //v
                        'path_cover'    => null,
                        'path_file'    => null,
                        'type_id'    => null, 
                        'author_id'    => null, 
                    ]);
                }
                // Excel::import(new CollectionsImport, request()->file('file'));
                return redirect()->back()->with('success','Data Collection Imported Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
    }
}
