<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index($id){  
        return view('search.details',[
            'data' => Collection::with('authors','subjects','language','type')->findOrFail($id)
        ]);
    }
}
