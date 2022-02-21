<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->Collection = new Collection();
        $posts = Collection::withCount('type')->get();
    }
    public function index(){
        // dd($this->Collection->type());
        return view('admin.pages.dashboard.index');
    }
}
