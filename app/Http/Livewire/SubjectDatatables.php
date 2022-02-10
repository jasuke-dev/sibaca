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
            NumberColumn::name('id')
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
            Column::callback(['id','subject'], function($id, $subject){
                return view('livewire.subject-datatables', [
                    'id' => $id,
                    'subject' => $subject
                ]);
            })->unsortable()
            ->alignCenter()
        ];  
    }
}
