<?php

namespace App\Http\Livewire;

use App\Models\Procurement;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProcurementDatatables extends LivewireDatatable
{
    public $model = Procurement::class;
    public $exportable = true;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('Procurement')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            // DateColumn::name('updated_at')
            //     ->filterable()
            //     ->alignCenter(),
            Column::callback(['id','procurement'], function($id, $procurement){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'name' => $procurement,
                    'edit' => false
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }
}