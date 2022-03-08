<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\AuthorCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function index(){
        dd(Collection::search('/P/XI/20')->get());
        return view('search.index');
    }
    public function search(Request $request){
        $result = NULL;
        if ($query = $request->get('query')){
            $result = Collection::search($query)->paginate(2);
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
                                $query->where('author_id',2);
                            })->paginate(2); 
        // return $result[0]->authors[0]->author;       
        return view('search.index',[
            'results' => $result,
        ]);
    }
}
