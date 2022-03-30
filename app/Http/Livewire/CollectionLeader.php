<?php

namespace App\Http\Livewire;

use App\Models\User;
use Complex\Complex;
use App\Models\Collection;
use App\Models\UserCollection;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CollectionLeader extends LivewireDatatable
{
    public $exportable = true;
    public $model = Collection::class;
    
    // public function builder(){
    //     return UserCollection::query()
    //                     ->join('collections','collections.id','user_collections.collection_id')
    //                     ->select(DB::raw('count(*) as count, user_collections.collection_id'))
    //                     ->whereBetween('user_collections.created_at',['2022-03-28','2022-04-30'])
    //                     ->groupBy('user_collections.collection_id');
    // }

    // public function builder()
    // {
    //     return Collection::query()
    //                 ->Join('user_collections', 'user_collections.collection_id', 'collections.id')
    //                 ->Join('author_collections', 'author_collections.collection_id', 'collections.id')
    //                 ->Join('authors', 'authors.id', 'author_collections.author_id')
    //                 ->whereBetween('user_collections.created_at',['2022-03-30','2022-04-30'])
    //                 ->groupBy('user_collections.collection_id');
    // }
    public function columns()
    {
        return [
            Column::name('title')
                ->searchable(),
            NumberColumn::name('users.id:count')
            ->label('Reads Count')
            ->defaultSort('desc'),
            // Column::raw('CONCAT(firstname," ", lastname) AS FullName')
            //     ->searchable(),
            // DateColumn::name('user_collections.created_at')
            //     ->filterable(),
        ];
    }

    public function getPivotProperty()
    {
        return UserCollection::all();
    }
}
