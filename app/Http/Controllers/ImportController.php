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
                    $RandName = Str::random(10).'.'.'pdf';
                    try {
                        $path = Storage::disk('collections')->put($RandName, base64_decode($b64_pdf, true));
                        // $path = Storage::putFile('collections', base64_decode($b64_pdf, true));
                        $pathName = 'collections/'.$RandName;
                    }catch(\Exception $e){
                        return redirect()->back()->with('error',"erro masukin file");
                    }
        
                    Collection::create([
                        'inventory_code' => $row->inventory_code, 
                        'title'    => empty($row->title) ? NULL : $row->title, 
                        'subtitle'    => empty($row->subtitle) ? NULL : $row->subtitle, 
                        'languange_id'    => empty($row->languange_id) ? NULL : $row->languange_id, 
                        'classification'    => empty($row->classification) ? NULL : $row->classification, 
                        'author_code'    => empty($row->author_code) ? NULL : $row->author_code, 
                        'title_code'    => empty($row->title_code) ? NULL : $row->title_code, 
                        'volume'    => empty($row->volume) ? NULL : $row->volume, 
                        'edition'    => empty($row->edition) ? NULL : $row->edition, 
                        'publisher_id'    => empty($row->publisher_id) ? NULL : $row->publisher_id, 
                        'publish_year'    => empty($row->publish_year) ? NULL : $row->publish_year, 
                        'procurement_id'    => empty($row->procurement_id) ? NULL : $row->procurement_id, 
                        'year_of_procurement'    => empty($row->year_of_procurement) ? NULL : $row->year_of_procurement, 
                        'price'    => empty($row->price) ? NULL : $row->price, 
                        'collation'    => empty($row->collation) ? NULL : $row->collation, 
                        'isbn_issn_doi'    => empty($row->isbn_issn_doi) ? NULL : $row->isbn_issn_doi, 
                        'abstract'    => empty($row->abstract) ? NULL : $row->abstract,
                        'publish_city'    => null, 
                        'path_cover'    => null,
                        'path_file'    => $pathName,
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
