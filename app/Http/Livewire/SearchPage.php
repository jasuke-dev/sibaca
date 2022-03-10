<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPage extends Component
{
    use WithPagination;
    protected $queryString = ['search'];
    public $search;
    public function render()
    {
        return view('livewire.search-page',[
            'results' => Collection::where('title', 'LIKE', "%$this->search%" ?? '%')->paginate(2),
            
        ]);
    }
}
