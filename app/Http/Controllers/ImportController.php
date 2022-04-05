<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Collection;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\AuthorImport;
use App\Imports\SubjectsImport;
use App\Imports\CollectionsImport;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
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
                Excel::import(new AuthorImport, request()->file('file'));
                return redirect()->back()->with('success','Data Imported Successfully');
            }elseif($import == 'publisher'){

            }elseif($import == 'procurement'){

            }elseif($import == 'collections'){
                $filedata = file_get_contents(request()->file('file'));
                $details = json_decode($filedata);

                
                $authors = explode(";",$details[0]->authors);
                foreach ($details as $row) 
                {
                    $b64_pdf = utf8_decode($row->base64file);

                    $inventory_code = addslashes($row->inventory_code);
                    $RandName = Str::random(10).'.'.'pdf';
                    try {
                        $path = Storage::disk('collections')->put($RandName, base64_decode($b64_pdf, true));
                        // $path = Storage::putFile('collections', base64_decode($b64_pdf, true));
                        $pathName = 'collections/'.$RandName;
                        
                        try {
                            //generate Cover
                            $pdf = new Pdf('storage/'.$pathName);
                            $RandCoverName = Str::random(10);
                            $pathCover = 'covers/'.$RandCoverName;
                            $pdf->saveImage('storage/'.$pathCover);
                        } catch (\Throwable $th) {
                            return redirect()->back()->with('error',"Error when generating thumbnail");
                        }
                    }catch(\Exception $e){
                        return redirect()->back()->with('error',"Error while save file");
                    }
        
                    $Collection = Collection::create([
                        'inventory_code' => $row->inventory_code, 
                        'isbn_issn_doi'    => empty($row->isbn_issn_doi) ? NULL : $row->isbn_issn_doi,
                        'title'    => empty($row->title) ? NULL : $row->title, 
                        'subtitle'    => empty($row->subtitle) ? NULL : $row->subtitle, 
                        'abstract'    => empty($row->abstract) ? NULL : $row->abstract,
                        'classification'    => empty($row->classification) ? NULL : $row->classification, 
                        'title_code'    => empty($row->title_code) ? NULL : $row->title_code, 
                        'author_code'    => empty($row->author_code) ? NULL : $row->author_code, 
                        'volume'    => empty($row->volume) ? NULL : $row->volume, 
                        'edition'    => empty($row->edition) ? NULL : $row->edition, 
                        'collation'    => empty($row->collation) ? NULL : $row->collation, 
                        'year_of_procurement'    => empty($row->year_of_procurement) ? NULL : $row->year_of_procurement, 
                        'publish_year'    => empty($row->publish_year) ? NULL : $row->publish_year, 
                        'publish_city'    => empty($row->publish_city) ? NULL : $row->publish_city, 
                        'price'    => empty($row->price) ? NULL : $row->price, 
                        'path_cover'    => $pathCover,
                        'path_file'    => $pathName,
                        'type_id'    => empty($row->type_id) ? NULL : $row->type_id, 
                        'language_code'    => empty($row->languange_code) ? NULL : $row->languange_code,
                        'publisher_id'    => empty($row->publisher_id) ? NULL : $row->publisher_id, 
                        'procurement_id'    => empty($row->procurement_id) ? NULL : $row->procurement_id,
                        'user_id' => Auth::id(), 
                    ]);

                    //mengkondisikan subject
                    $list_subject_code = [];
                    $subjects = explode(',',$row->subjects);
                    foreach($subjects as $subject){
                        $SearchSubject = Subject::query()
                            ->where('subject','like',$subject)->get();
                        
                        if(isset($SearchAuthor[0])){
                            array_push($list_subject_code, $SearchAuthor[0]->code);
                        }else{
                            $newSubject = Subject::create(['code'=>Str::random(5),'subject'=>$subject]);
                            array_push($list_subject_code,$newSubject->code);
                        }
                    }
                    //mengkondisikan author
                    $list_author_code = [];
                    $authors = explode(';',$row->authors);
                    foreach($authors as $a){
                        $author = explode(',',$a);
                        $SearchAuthor = Author::query()
                            ->where('firstname','like',$author[0])
                            ->orwhere('lastname','LIKE',$author[1])->get();
                        
                        if(isset($SearchAuthor[0])){
                            array_push($list_author_code, $SearchAuthor[0]->id);
                        }else{
                            $newAuthor = Author::create(['firstname'=>$author[0],'lastname' => $author[1]]);
                            array_push($list_author_code,$newAuthor->id);
                        }
                    }
                    
                    $Collection->authors()->attach($list_author_code);
                    $Collection->subjects()->attach($list_subject_code);
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
