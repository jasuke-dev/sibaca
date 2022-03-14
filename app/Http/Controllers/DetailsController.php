<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index($id){
        // $data = Collection::with('authors','subjects')->where('id',$id)->get();
        // dd($data[0]->authors);
        return view('search.details',[
            'data' => Collection::with('authors','subjects','language','type')->where('id',$id)->get()
        ]);
    }
}
