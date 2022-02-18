<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Http\Requests\StoreEbookRequest;
use App\Http\Requests\UpdateEbookRequest;
use App\Models\Author;
use App\Models\Language;
use App\Models\Type;
use Illuminate\Http\Request;

class EbookController extends Controller
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEbookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'isbn_issn_doi' => 'required|max:255',
            'abstract' => 'required|max:255',
            'publish_year' => 'required|max:255',
            'type' => 'required|max:255',
            'language' => 'required|max:255',
            'author' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:5048',
            'cover' => ['required','mimes:png,jpg,jpeg','max:5048'],
        ]);

        $path = $request->file('file')->store('public/files/ebooks');
        $path_cover = $request->file('cover')->store('public/files/covers');

        $validated = [
          'title' => $request['title'],
          'isbn_issn_doi' => $request['isbn_issn_doi'],
          'abstract' => $request['abstract'],
          'publish_year' => $request['publish_year'],
          'type' => $request['type'],
          'language' => $request['language'],
          'author' => $request['author'],
          'path_file' => $path,
          'path_cover' => $path_cover,
        ];        
        try {
            Ebook::create($validated);
            return redirect('/admin/collections')->with('success',"New Collections has been aded!");
        } catch (\Exception $e) {
            return redirect('/admin/collections')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show(Ebook $ebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebook $ebook)
    {
        return view('admin.pages.lists.edit',[
            'ebook' => $ebook,
            'types' => Type::all(),
            'languages' => Language::all(),
            'authors' => Author::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEbookRequest  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEbookRequest $request, Ebook $ebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        //
    }
}
