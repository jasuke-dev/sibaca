@extends('layouts.main')

@section('container')
    <div class="py-20 px-60">
        <div class="grid grid-flow-col grid-cols-6 gap-6">
            <div class="col-span-2 px-10">
                <div class="bg-slate-200 p-5 rounded-md self-baseline h-full">
                    <img class="max-h-full" src="{{ asset('storage/'.$data->path_cover) }}" alt="">
                </div>
            </div>
            <div class="grid grid-flow-row grid-rows-6 col-span-4 gap-4 self-end">
                <div class="row-span-2 space-y-3">
                    <div class="text-3xl font-bold">
                        {{ $data->title }}
                    </div>
                    <div class="text-2xl font-medium">
                        {{ $data->subtitle }}
                    </div>
                    <div>
                        @foreach ($data->authors as $author)
                            <a href="" class="font-medium hover:text-green-900 text-lime-700">{{ $author->author }}</a>
                        @endforeach
                    </div>
                    <div>
                        @foreach ($data->subjects as $subject)
                        <button class="bg-slate-200 hover:bg-slate-300 font-normal py-2 px-4 rounded text-sm">{{ $subject->subject }}</button>
                        @endforeach
                    </div>
                </div>
                <div class="row-span-4 space-y-2">
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">ISBN/ISSN/DOI</div>
                        <div class="col-span-3 font-medium">: {{ $data->isbn_issn_doi }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Volume</div>
                        <div class="col-span-3 font-medium">: {{ $data->volume }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Edition</div>
                        <div class="col-span-3 font-medium">: {{ $data->edition }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Collation</div>
                        <div class="col-span-3 font-medium">: {{ $data->collation }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Type</div>
                        <div class="col-span-3 font-medium">: {{ $data->type->type }}</div>
                    </div>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1 font-semibold">Language</div>
                        <div class="col-span-3 font-medium">: {{ $data->language->language }}</div>
                    </div>
                    {{-- <a class="font-bold text-blue-600" href="/pdf/{{ $data->path_file }}">View PDF</a> --}}
                    <a target="" class="font-bold text-blue-600" href="{{ '/pdf/'.$data->id }}">View PDF</a>
                </div>
            </div>
        </div>
        <div class="py-10">
            <div class="font-semibold">
                Abstract
            </div>
            <p class="text-justify">
                {{ $data->abstract }}
            </p>
        </div>
    </div>

@endsection