<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->Collection = new Collection();
        $posts = Collection::withCount('type')->get();
    }
    public function index(){
        return view('admin.pages.dashboard.index');
    }

    public function ajax(Request $request){
        $types = DB::table('collections')
                    ->join('types','collections.type_id','=','types.id')
                    ->selectRaw('types.type, count(types.type) as count')
                    ->groupBy('types.type')
                    ->get();
        return response()->json(['types' => $types]);
    }
}
