<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PDFController extends Controller
{
    public function viewer(Collection $collection){
        $path = public_path('storage/' . $collection->path_file);
        if(File::exists($path)){
            try {
                $collection->users()->attach(Auth::id());
            } catch (\Exception $e) {
                dd($e);
            }
            $header = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . explode("/",$collection->path_file)[1] . '"',
                'Cache-Control' => 'no-cache'
            ];
            return response()->file($path, $header);
        }else{
            dd("gaada");
            //not found page
        }
        
    }
}
