<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = Jenis::get();
            // echo($data);
            // return Datatables::of($data)
            //         ->addIndexColumn()
            //         ->make(true);
            return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
        }

        return view('admin.pages.jenis.index',[
            'jenis' => Jenis::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejenisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejenisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejenisRequest  $request
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejenisRequest $request, jenis $jenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenis $jenis)
    {
        //
    }
}
