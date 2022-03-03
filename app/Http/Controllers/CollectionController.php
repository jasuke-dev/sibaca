<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Author;
use App\Models\Language;
use App\Models\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\AuthorCollection;
use App\Models\Procurement;
use App\Models\Publisher;
use App\Models\Subject;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.lists.index',[
            'title' => 'Collections',
            'page' => 'collections',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.lists.create',[
            'title' => 'Collections',
            'page' => 'collections',
            'types' => Type::all(),
            'languages' => Language::all(),
            'authors' => Author::all(),
            'publishers' => Publisher::all(),
            'procurements' => Procurement::all(),
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'isbn_issn_doi' => 'required|max:255',
        //     'abstract' => 'required|max:255',
        //     'publish_year' => 'required|max:255',
        //     'type' => 'required|max:255',
        //     'language' => 'required|max:255',
        //     'author' => 'required|max:255',
        //     'file' => 'required|mimes:pdf|max:5048',
        //     'cover' => ['required','mimes:png,jpg,jpeg','max:5048'],
        // ]);

        // $path = $request->file('file')->store('public/files/ebooks');
        // $path_cover = $request->file('cover')->store('public/files/covers');

        
        $path = 'f';
        $path_cover = 'f';
        
        $validated = [
            'inventory_code' => $request['inventory_code'],
            'isbn_issn_doi' => $request['isbn_issn_doi'],
            'title' => $request['title'],
            'title_code' => $request['title_code'],
            'subtitle' => $request['subtitle'],
            'abstract' => $request['abstract'],
            'type_id' => $request['type'],
            'author_code' => $request['author_code'],
            'language_id' => $request['language'],
            'publish_year' => $request['publish_year'],
            'classification' => $request['classification'],
            'volume' => $request['volume'],
            'edition' => $request['edition'],
            'collation' => $request['collation'],
            'publisher_id' => $request['publisher'],
            'publish_city' => $request['publish_city'],
            'publish_year' => $request['publish_year'],
            'procurement_id' => $request['procurement'],
            'year_of_procurement' => $request['year_of_procurement'],
            'price' => $request['price'],
            'path_file' => $path,
            'path_cover' => $path_cover,
        ];      
        dd($request);
        try {
            $Collection = Collection::create($validated);
            $Collection->authors()->attach($request['author']);
            $Collection->subjects()->attach($request['subject']);
            
            return redirect('/admin/collections')->with('success',"New Collections has been aded!");
        } catch (\Exception $e) {
            return redirect('/admin/collections')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return $collection->subject()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view('admin.pages.lists.edit',[
            'collection' => $collection,
            'types' => Type::all(),
            'languages' => Language::all(),
            'authors' => Author::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectionRequest  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
