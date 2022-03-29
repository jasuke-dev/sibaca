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
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('username')
                ->filterable()
                ->alignCenter(),
            Column::name('role')
                ->filterable()
                ->alignCenter(),
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
                    'edit' => true,
                    'model' => 'users'
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }

}
