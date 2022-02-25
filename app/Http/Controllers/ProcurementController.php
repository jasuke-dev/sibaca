<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.lists.index',[
            'title' => 'Procurement',
            'page' => 'procurement',
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
            'title' => 'Procurement',
            'page' => 'procurement',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'procurement' => 'required|max:255',
        ]);

        Procurement::create($validatedData);

        return redirect('/admin/procurement')->with('success',"New Procurement has been aded!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function show(Procurement $procurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Procurement $procurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procurement $procurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procurement $procurement)
    {
        //
    }
}
