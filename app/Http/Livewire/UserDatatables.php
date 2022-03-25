<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class UserDatatables extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;
    
    public function columns()
    {
        return [
            Column::checkbox(),

            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('username')
                ->filterable()
                ->alignCenter()
                ->editable(),
            Column::name('role')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            DateColumn::name('updated_at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['id','username'], function($id, $username){
                return view('livewire.lists-datatables', [
                    'id' => $id,
                    'name' => $username,
                    'edit' => false
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }

}
