<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Author;
use App\Models\Subject;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Collection;
use Spatie\PdfToImage\Pdf;
use App\Models\Procurement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AuthorCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use Carbon\Carbon;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return (Collection::with('subjects')->findOrFail('ee6542c2-6314-444a-8116-41fd985c976b'));
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
        //     'inventory_code' => 'required|max:255',
        //     'isbn_issn_doi' => 'required|max:255',
        //     'title' => 'required|max:255',
        //     'type' => 'required|max:255',
        //     'author' => 'required',
        //     'subjects' => 'required',
        //     'language' => 'required',
        //     'publisher' => 'required',
        //     'procurement' => 'required',
        //     'file' => 'required|file|mimes:pdf|max:50048',
        //     'cover' => ['file','mimes:png,jpg,jpeg','max:5048'],
        // ]);
        try{
            $path = $request->file('file')->store('collections');
            if (request()->has('cover')){
                $pathCover = $request->file('cover')->store('covers');
            }else{
                //generate Cover
                //instanciate new pdf lama karna spatie pdf imagick $this->imagick->pingImage($pdfFile); dikomen aja
                $pdf = new Pdf($request->file('file'));
                $RandCoverName = Str::random(10);
                $pathCover = 'covers/'.$RandCoverName.'.jpg';
                $pdf->saveImage('storage/'.$pathCover);
            }
        } catch (\Exception $e) {
            return redirect('/admin/collections')->with('error',$e->getMessage());
        }
        $validated = [
            'inventory_code' => $request['inventory_code'],
            'isbn_issn_doi' => $request['isbn_issn_doi'],
            'title' => $request['title'],
            'title_code' => $request['title_code'],
            'subtitle' => $request['subtitle'],
            'abstract' => $request['abstract'],
            'type_id' => $request['type'],
            'author_code' => $request['author_code'],
            'language_code' => $request['language'],
            'publish_year' => $request['publish_year'],
            'classification' => $request['classification'],
            'volume' => $request['volume'],
            'edition' => $request['edition'],
            'collation' => $request['collation'],
            'publisher_id' => $request['publisher'],
            'publish_city' => $request['publish_city'],
            'publish_year' => $request['publish_year'],
            'procurement_id' => $request['procurement'],
            'user_id' => Auth::id(),
            'year_of_procurement' => $request['year_of_procurement'],
            'price' => $request['price'],
            'path_file' => $path,
            'path_cover' => $pathCover,
        ];      
        try {
            $Collection = Collection::create($validated);
            $Collection->authors()->attach($request['author']);
            $Collection->subjects()->attach($request['subjects']);
            
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
            'publishers' => Publisher::all(),
            'procurements' => Procurement::all(),
            'page' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectionRequest  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'inventory_code' => 'required|max:255',
            'isbn_issn_doi' => 'required|max:255',
            'title' => 'required|max:255',
            'type' => 'required|max:255',
            'author' => 'required',
            'language' => 'required',
            'publisher' => 'required',
            'procurement' => 'required',
            'file' => 'file|mimes:pdf|max:50048',
            'cover' => ['file','mimes:png,jpg,jpeg','max:5048'],
        ]);
        $validated = [
            'inventory_code' => $request['inventory_code'],
            'isbn_issn_doi' => $request['isbn_issn_doi'],
            'title' => $request['title'],
            'title_code' => $request['title_code'],
            'subtitle' => $request['subtitle'],
            'abstract' => $request['abstract'],
            'type_id' => $request['type'],
            'author_code' => $request['author_code'],
            'language_code' => $request['language'],
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
            'updated_at' => Carbon::now()->timestamp
        ];
        if($request->file('file') && $request->file('cover')){
            Storage::delete($request->oldFile);
            Storage::delete($request->oldCover);
            try{
                $validated['path_file'] = $request->file('file')->store('collections');
                $validated['path_cover'] = $request->file('cover')->store('covers');
            } catch (\Exception $e) {
                return redirect('/admin/collections')->with('error',$e->getMessage());
            }
        }elseif($request->file('cover')){
            try{
                Storage::delete($request->oldCover);
                $validated['path_cover'] = $request->file('cover')->store('covers');
            }catch(\Exception $e) {
                return redirect('/admin/collections')->with('error',$e->getMessage());
            }
            
        }elseif($request->file('file')){
            try{
                Storage::delete($request->oldFile);
                $validated['path_file'] = $request->file('file')->store('collections');
            }catch(\Exception $e){
                return redirect('/admin/collections')->with('error',$e->getMessage());
            }
        }
        
        try {
            // Collection::where('id', $collection->id)
            //     ->update($validated);
            $Collection = Collection::find($collection->id);
            $Collection->update($validated);
            $Collection->authors()->sync($request['author']);
            $Collection->subjects()->sync($request['subjects']);
            
            return redirect('/admin/collections')->with('success',"Collections Succesfully Update!");
        } catch (\Exception $e) {
            return redirect('/admin/collections')->with('error',$e->getMessage());
        }
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
