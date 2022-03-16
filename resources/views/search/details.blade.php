@extends('layouts.main')

@section('container')
    <div class="grid grid-flow-col grid-cols-6 gap-6 p-60">
        <div class="col-span-2 bg-slate-200 p-5 rounded-md self-center">
            <img src="{{ asset('storage/files/' . $data[0]->path_cover) }}" alt="">
        </div>
        <div class="grid grid-flow-row grid-rows-6 col-span-4 gap-6">
            <div class="row-span-2 space-y-3">
                <div class="text-3xl font-bold">
                    {{ $data[0]->title }}
                </div>
                <div class="text-2xl font-medium">
                    {{ $data[0]->subtitle }}
                </div>
                <div>
                    @foreach ($data[0]->authors as $author)
                        <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
                    @endforeach
                </div>
                <div>
                    @foreach ($data[0]->subjects as $subject)
                    <button class="bg-slate-200 hover:bg-slate-300 font-normal py-2 px-4 rounded text-sm">{{ $subject->subject }}</button>
                    @endforeach
                </div>
            </div>
            <div class="row-span-4 space-y-2">
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">ISBN/ISSN/DOI</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->isbn_issn_doi }}</div>
                </div>
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">Volume</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->volume }}</div>
                </div>
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">Edition</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->edition }}</div>
                </div>
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">Collation</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->collation }}</div>
                </div>
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">Type</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->type->type }}</div>
                </div>
                <div class="grid grid-cols-4">
                    <div class="col-span-1 font-semibold">Language</div>
                    <div class="col-span-3 font-medium">: {{ $data[0]->language->language }}</div>
                </div>
                <a class="font-bold text-blue-600" href="/pdf/{{ $data[0]->path_file }}">View PDF</a>
                <div class="font-semibold">
                    Abstract
                </div>
                <div>
                    {{ $data[0]->abstract }}
                </div>
            </div>
        </div>
    </div>

@endsection