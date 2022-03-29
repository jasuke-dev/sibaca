<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Collection;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserLeader extends LivewireDatatable
{
    public $model = Author::class;
    public $exportable = true;

    public function columns()
    {
        return [
            Column::name('firstname')
                ->label('Author'),
            Column::name('collections.title')
                ->truncate(100),
            NumberColumn::name('collections.id:count')
                ->label('Articles Count')
                ->defaultSort('desc'),
        ];
    }
}
