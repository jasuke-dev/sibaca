<?php

namespace App\Http\Livewire;

use App\Models\Language;
use App\Models\Type;
use App\Models\Author;
use App\Models\Collection;
use App\Models\Procurement;
use App\Models\Subject;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionDatatables extends LivewireDatatable
{
    public $hideable = 'select';
    public $model = Collection::class;
    public $exportable = true;
    public $complex = true;
    public function builder()
    {
        return Collection::query()
                    ->leftJoin('languages', 'languages.id', 'collections.language_id')
                    ->leftJoin('types', 'types.id', 'collections.type_id')
                    ->leftJoin('procurements', 'procurements.id', 'collections.procurement_id');
    }

    public function columns()
    {
        return [
            // NumberColumn::name('id')
            //     ->filterable()
            //     ->truncate(20),
            Column::name('inventory_code')
                ->label('Inventory Code')
                ->filterable(),
            Column::name('isbn_issn_doi')
                ->label('ISBN/ISSN/DOI')
                ->filterable(),
            Column::name('title')
                ->filterable()
                ->alignCenter()
                ->searchable(),
            Column::name('abstract')
                ->filterable()
                ->searchable()
                ->truncate(30),
            Column::name('authors.author')
                ->filterable($this->authors->pluck('author'))
                ->alignCenter(),
            Column::name('subjects.subject')
                ->filterable()
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
            Column::name('procurements.procurement')
                ->filterable($this->procurements->pluck('procurement'))
                ->label('Procurement'),
            Column::callback(['id','title'], function($id, $title){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'title' => $title,
                    'pages' => 'collections'
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
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
    public function getProcurementsProperty()
    {
        return Procurement::all();
    }
    // public function getSubjectsProperty()
    // {
    //     return Subject::all();
    // }
}