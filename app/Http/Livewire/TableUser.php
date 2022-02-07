<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TableUser extends LivewireDatatable
{
    // public function builder()
    // {
        
    // }
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),
  
            Column::name('name')
                ->label('Name'),
  
            Column::name('email'),
  
            DateColumn::name('created_at')
                ->label('Creation Date')
        ];
    }
}