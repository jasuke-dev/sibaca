<?php

namespace App\Http\Livewire;

use App\Models\Language;
use App\Models\Type;
use App\Models\Author;
use App\Models\Collection;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionDatatables extends LivewireDatatable
{
    public $model = Collection::class;
    public $exportable = true;
    public function builder()
    {
        return Collection::query()
                    ->leftJoin('languages', 'languages.id', 'collections.language_id')
                    ->leftJoin('types', 'types.id', 'collections.type_id')
                    ->leftJoin('authors', 'authors.id', 'collections.author_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable(),
            Column::name('isbn_issn_doi')
                ->label('ISBN/ISSN/DOI')
                ->filterable(),
            Column::name('title')
                ->filterable()
                ->alignCenter(),
            Column::name('abstract')
                ->filterable()
                ->alignCenter(),
            Column::name('authors.author')
                ->filterable($this->authors->pluck('author'))
                ->alignCenter(),
            NumberColumn::name('publish_year')
                ->filterable()
                ->alignCenter(),
            Column::name('languages.language')
                ->filterable($this->languages->pluck('language'))
                ->label('Language'),
            Column::name('types.type')
                ->filterable($this->types->pluck('type'))
                ->label('Types'),
            Column::callback(['id','title'], function($id, $title){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'title' => $title,
                    'pages' => 'collections'
                ]);
            })->unsortable()
            ->alignCenter()
        ];
    }

    public function getLanguagesProperty()
    {
        return Language::all();
    }
    public function getEbooksProperty()
    {
        return Collection::all();
    }
    public function getTypesProperty()
    {
        return Type::all();
    }
    public function getAuthorsProperty()
    {
        return Author::all();
    }
}