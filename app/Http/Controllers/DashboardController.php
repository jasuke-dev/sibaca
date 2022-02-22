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

        // $distinct_user = DB::table('user_collections')->distinct()->get(['user_id']);
        $distinct_user = DB::table('user_collections')->select('user_id',);
        $distinct_createdAt = DB::table('user_collections')->select('created_at');
        // $distinct_createdAt = DB::table('user_collections')->distinct()->get(['created_at']);
        $read = DB::table('user_collections')
                    ->rightJoinSub($distinct_createdAt,'alias_createdAt',function($join){
                        $join->on('user_collections.created_at','=','alias_createdAt.created_at');
                    })
                    ->JoinSub($distinct_user,'alias_user',function($join2){
                        $join2->on('user_collections.user_id','=','alias_user.user_id');
                    })
                    ->selectRaw('user_collections.user_id, count(user_collections.user_id) as count')
                    ->groupBy('alias_user.user_id')
                    ->get();

        dd($distinct_user);
        // return response()->json(['types' => $types]);
    }
}
