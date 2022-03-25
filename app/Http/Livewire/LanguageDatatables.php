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
            NumberColumn::name('code')
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
            Column::callback(['code','language'], function($code, $language){
                return view('livewire.lists-datatables', [
                    'id' => $code,
                    'name' => $language,
                    'edit' => false
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }
}
