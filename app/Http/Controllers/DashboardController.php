<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\UserCollection;
use function PHPSTORM_META\type;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\CrossJoinSequence;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->Collection = new Collection();
        $posts = Collection::withCount('type')->get();
    }
    public function index(){
        if (!extension_loaded('imagick')){
            dd('imagick not installed');
        }
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        return view('admin.pages.dashboard.index',[
            'user' => User::count(),
            'collection' => Collection::count(),
            'reads' => UserCollection::count(),
            'author' => Author::count(),
        ]);
    }

    public function ajax(Request $request){
        if(! $this->authorize('SuperAdmin')){
            abort(403);
        }
        if(isset($request->data)){
            if($request->data == 'types'){
                $types = DB::table('collections')
                            ->join('types','collections.type_id','=','types.id')
                            ->selectRaw('types.type, count(types.type) as count')
                            ->groupBy('types.type')
                            ->get();
                return response()->json(['types' => $types]);
                
            }elseif(isset($request->range) && $request->data == 'timeseries'){
                if($request->range == 'pastsixmonths'){
                    $firstMonth = intval(date("m", strtotime("-6 months")));
                    $firstYear = intval(date("Y", strtotime("-6 months")));
                    $lastYear = intval(date("Y"));
                    $lastMonth = intval(date("m"));
                }elseif($request->range == 'pastyears'){
                    $lastYear = intval(date("Y"));
                    $lastMonth = intval(date("m"));
                    $firstMonth = intval(date("m", strtotime("-12 months")));
                    $firstYear = intval(date("Y", strtotime("-12 months")));
                }elseif($request->range == 'pastmonths'){
                    $lastYear = intval(date("Y"));
                    $lastMonth = intval(date("m"));
                    $firstMonth = intval(date("m", strtotime("-1 months")));
                    $firstYear = intval(date("Y", strtotime("-1 months")));
                }

                $timeseries = DB::select("SELECT c.created_at,
                DATE_FORMAT(c.created_at, '%M %Y') AS Month,
                    s.username,
                    COUNT(t.user_id) AS Count
                FROM (
                SELECT DISTINCT created_at FROM user_collections
                ) AS c
                CROSS JOIN (
                SELECT DISTINCT user_id FROM user_collections
                ) AS u
                LEFT JOIN user_collections AS t ON t.created_at = c.created_at and t.user_id = u.user_id
                LEFT JOIN users AS s on s.id = u.user_id
                WHERE YEAR(c.created_at) between ${firstYear} and ${lastYear} or MONTH(c.created_at) between ${firstMonth} and ${lastMonth}
                GROUP BY MONTH(c.created_at), s.username
                ORDER BY created_at ASC");

                return response()->json(['timeseries' => $timeseries]);
            }
        }

        // $distinct_user = DB::table('user_collections')->select('user_id');
        // $distinct_createdAt = DB::table('user_collections')->select('created_at');
        // $distinct_user = DB::table('user_collections')->distinct('user_id');
        // $distinct_createdAt = DB::table('user_collections')->distinct('created_at');
        // $crossJoin = $distinct_createdAt->crossJoin($distinct_user);
       

        // $read = $distinct_createdAt
        //             ->crossJoin($distinct_user)
        //             ->leftJoin('user_collections','user_collections.user_id','=');
        // ======================================
        // $read = $crossJoin
        //         ->leftJoinSub(DB::table('user_collections'),'userCollection',function($join){
        //             $join->on('user_collections.created_at','=','crossjoin.created_at' and 'user_collections.user_id','=','crossjoin.user_id');
        //         })
        //         ->selectRaw('userCollection.user_id, count(userCollection.user_id) as count')
        //         ->groupBy('UserCollection.user_id');
        // ==========================
        // $read = DB::table('user_collections')
        //             ->rightJoinSub($crossJoin,'crossjoin',function($join){
        //                 $join->on('user_collections.created_at','=','crossjoin.created_at');
        //             })
        //             ->selectRaw('distinct_user.user_id, count(user_collections.user_id) as count')
        //             ->groupBy('distinct_user.user_id','distinct_createdAt.created_at')
        //             ->get();

        
        // $read = DB::table('user_collections')
        //             ->rightJoinSub($distinct_createdAt,'distinct_createdAt',function($join){
        //                 $join->on('user_collections.created_at','=','distinct_createdAt.created_at');
        //             })
        //             ->joinSub($distinct_user,'distinct_user',function($join2){
        //                 $join2->on('user_collections.user_id','=','distinct_user.user_id');
        //             })
        //             ->selectRaw('distinct_user.user_id, count(user_collections.user_id) as count')
        //             ->groupBy('distinct_user.user_id','distinct_createdAt.created_at')
        //             ->get();
        
    }
}
