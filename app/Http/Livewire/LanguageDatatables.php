<?php

namespace App\Http\Livewire;

use App\Models\Language;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class LanguageDatatables extends LivewireDatatable
{
    public $model = Language::class;
    public $exportable = true;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->filterable()
                ->alignCenter(),
            Column::name('language')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            DateColumn::name('updated_at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['id','language'], function($id, $language){
                return view('livewire.language-datatables', [
                    'id' => $id,
                    'type' => $language
                ]);
            })->unsortable()
            ->alignCenter()
        ];  
    }
}
