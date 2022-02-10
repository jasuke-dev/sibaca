<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TypeDatatables extends LivewireDatatable
{
    public $model = Type::class;
    public $exportable = true;
    
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('type')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            DateColumn::name('updated_at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['id','type'], function($id, $type){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'type' => $type
                ]);
            })->unsortable()
            ->alignCenter()
        ];  
    }
}
