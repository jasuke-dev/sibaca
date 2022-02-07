<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use App\Models\Jenis;
use App\Models\Type;

class TypeDatatables extends LivewireDatatable
{
    public $model = Type::class;
    public $exportable = true;
    
    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),
            Column::name('type')->filterable()->searchable(),
            Column::name('created_at')->filterable()->searchable(),
            Column::name('updated_at')->filterable()->searchable(),
            Column::callback(['id','type'], function($id, $type){
                return view('livewire.type-datatables', [
                    'id' => $id,
                    'type' => $type
                ]);
            })->unsortable()
        ];  
    }
}
