<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AuthorDatatables extends LivewireDatatable
{
    public $model = Author::class;
    public $exportable = true;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('name')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            DateColumn::name('updated_at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['id','name'], function($id, $name){
                return view('livewire.author-datatables', [
                    'id' => $id,
                    'name' => $name
                ]);
            })->unsortable()
            ->alignCenter()
        ];  
    }
}
