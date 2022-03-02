<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SubjectsImport;
use App\Imports\CollectionsImport;

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
                Excel::import(new CollectionsImport, request()->file('file'));
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
