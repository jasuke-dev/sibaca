<?php

namespace App\Http\Controllers;

use App\Models\EbookSubject;
use App\Http\Requests\StoreEbookSubjectRequest;
use App\Http\Requests\UpdateEbookSubjectRequest;

class EbookSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEbookSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEbookSubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EbookSubject  $ebookSubject
     * @return \Illuminate\Http\Response
     */
    public function show(EbookSubject $ebookSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EbookSubject  $ebookSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(EbookSubject $ebookSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEbookSubjectRequest  $request
     * @param  \App\Models\EbookSubject  $ebookSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEbookSubjectRequest $request, EbookSubject $ebookSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EbookSubject  $ebookSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(EbookSubject $ebookSubject)
    {
        //
    }
}
