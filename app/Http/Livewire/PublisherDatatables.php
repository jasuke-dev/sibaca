<?php

namespace App\Http\Livewire;

use App\Models\Publisher;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PublisherDatatables extends LivewireDatatable
{
    public $model = Publisher::class;
    public $exportable = true;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('publisher')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            // DateColumn::name('updated_at')
            //     ->filterable()
            //     ->alignCenter(),
            Column::callback(['id','publisher'], function($id, $publisher){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'name' => $publisher,
                    'edit' => false
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }
}