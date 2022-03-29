<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use App\Models\User;
use Complex\Complex;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionLeader extends LivewireDatatable
{
    public $exportable = true;
    public $model = Collection::class;
    
    public function columns()
    {
        return [
            Column::name('title')
                ->searchable(),
            Column::name('authors.firstname')
                ->searchable(),
            NumberColumn::name('users.id:count')
                ->label('Reads Count')
                ->defaultSort('desc')
        ];
    }
}
