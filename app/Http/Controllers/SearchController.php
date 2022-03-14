<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\AuthorCollection;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function index(){
        return view('search.index');
    }
    public function search(Request $request){
        $result = NULL;
        if ($query = $request->get('query')){
            $result = Collection::search($query)->paginate(10);
        }else if($query = $request->get('filter')){
            // $result = AuthorCollection::search()
            // ->whereIn('author_id',$query)
            // ->get();
            // $result = Collection::whereHas('authors', function (Builder $query) {
            //     $query->where('author_collection.author_id', 'like', 'code%');
            // })->get();
            $collection = Collection::orderBy('id','desc');
            $result = $collection->whereHas('author', function($query){
                $query->where('author_id',1);
            });
        }else{
            $result = Collection::search()->paginate(2);
        }
        $collection = Collection::OrderBy('id','desc')->with('authors');
        $result = $collection->where('title', 'LIKE' ,'%a%')
                            ->orWhereHas('authors', function($query){
                                $query->where('author_id',null);
                            })->paginate(10); 
        // return $result[0]->authors[0]->author;       
        return view('search.index',[
            'results' => $result,
        ]);
    }
    public function ajax(Request $request){
        $subjects = null;
        if(isset($request->data)){
            if($request->data = 'subjects'){
                if(isset($request->query)){
                    $subjects = Subject::where('subject','LIKE','%a')->get();
                }
            }
        }
        return response()->json(['subjects' => $subjects]);
    }
}
