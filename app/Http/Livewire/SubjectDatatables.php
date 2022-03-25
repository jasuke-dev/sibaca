<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SubjectDatatables extends LivewireDatatable
{
    public $model = Subject::class;
    public $exportable = true;

    public function columns()
    {
        return [
            Column::name('code')
                ->filterable()
                ->alignCenter(),
            Column::name('subject')
                ->filterable()
                ->alignCenter()
                ->editable(),
            DateColumn::name('created_at')
                ->filterable()
                ->alignCenter(),
            DateColumn::name('updated_at')
                ->filterable()
                ->alignCenter(),
            Column::callback(['code','subject'], function($code, $subject){
                return view('livewire.lists-datatables', [
                    'id' => $code,
                    'name' => $subject,
                    'edit' => false
                ]);
            })->unsortable()
            ->alignCenter()
            ->excludeFromExport()
        ];  
    }
}
