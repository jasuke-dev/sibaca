<?php

namespace App\Http\Livewire;

use App\Models\Ebook;
use App\Models\Language;
use App\Models\Type;
use App\Models\Author;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionDatatables extends LivewireDatatable
{
    public $model = Ebook::class;
    public $exportable = true;
    public function builder()
    {
        return Ebook::query()
                    ->leftJoin('languages', 'languages.id', 'ebooks.language_id')
                    ->leftJoin('types', 'types.id', 'ebooks.type_id')
                    ->leftJoin('authors', 'authors.id', 'ebooks.author_id');
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
        return Ebook::all();
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