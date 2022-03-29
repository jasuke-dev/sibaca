<?php

namespace App\Http\Livewire;

use App\Models\Language;
use App\Models\Type;
use App\Models\Author;
use App\Models\Collection;
use App\Models\Procurement;
use App\Models\Publisher;
use App\Models\Subject;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionDatatables extends LivewireDatatable
{
    public $hideable = 'select';
    public $model = Collection::class;
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;
    
    public function builder()
    {
        return Collection::query()
                    ->leftJoin('languages', 'languages.code', 'collections.language_code')
                    ->leftJoin('types', 'types.id', 'collections.type_id')
                    ->leftJoin('publishers', 'publishers.id', 'collections.publisher_id')
                    ->leftJoin('users', 'users.id', 'collections.user_id')
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
            Column::name('authors.firstname')
                ->alignCenter()
                ->label('Author Firstname')
                ->filterable($this->authors->pluck('firstname')),
            Column::name('authors.lastname')
                ->alignCenter()
                ->label('Author lastname')
                ->filterable($this->authors->pluck('lastname')),
            // Column::raw('CONCAT(authors.firstname, " ", authors.lastname) AS Full')
            //     ->label('Authors')
            //     ->filterable(),
            // Column::callback(['authors.firstname', 'authors.lastname'], function ($id, $planetName) {
            //     return "User $id hails from $planetName";
            // })->label('Computed (php closure)'),
            Column::name('subjects.subject')
                ->filterable()
                ->alignCenter(),
            NumberColumn::name('publish_year')
                ->filterable()
                ->alignCenter()
                ->label('Publish Year'),
            Column::name('languages.language')
                ->filterable($this->languages->pluck('language'))
                ->label('Language')
                ->alignCenter(),
            Column::name('types.type')
                ->filterable($this->types->pluck('type'))
                ->alignCenter()
                ->label('Types'),
            Column::name('procurements.procurement')
                ->filterable($this->procurements->pluck('procurement'))
                ->alignCenter()
                ->label('Procurement'),
            NumberColumn::name('year_of_procurement')
                ->label('Procurement Year')
                ->filterable()
                ->alignCenter(),
            Column::name('publishers.publisher')
                ->filterable($this->publishers->pluck('publisher'))
                ->alignCenter()
                ->label('Publisher'),
            Column::name('creators.username')
                ->filterable($this->creators)
                ->alignCenter()
                ->label('Creator'),
            DateColumn::name('Created_at')
                ->label('Created at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['id','title'], function($id, $title){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'name' => $title,
                    'edit' => true,
                    'model' => 'collections'
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
    public function getPublishersProperty()
    {
        return Publisher::all();
    }
    public function getCreatorsProperty()
    {
        return User::pluck('username');
    }
    // public function getSubjectsProperty()
    // {
    //     return Subject::all();
    // }
}