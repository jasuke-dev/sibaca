<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Author;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Language;
use App\Models\Collection;
use Livewire\WithPagination;

class SearchPage extends Component
{
    use WithPagination;
    public $search;
    public $type;
    public $author;
    public $language;
    public $subject;
    protected $queryString = ['search','type','author','language','subject'];
    public function render()
    {
        return view('livewire.search-page',[
            'results' => Collection::with('authors')
                                    ->where('title', 'LIKE', "%$this->search%" ?? '%')
                                    ->when($this->type, function($query, $type){
                                        return $query->where('type_id','LIKE',$type);
                                    })
                                    ->when($this->author, function($query){
                                        return $query->WhereHas('authors', function($query){
                                            $query->where('author_id','LIKE',$this->author ?? 0);
                                        });
                                    })
                                    ->when($this->language, function($query, $language){
                                        return $query->where('language_id','LIKE',$language);
                                    })
                                    ->paginate(2),
            'types' => Type::all(),
            'authors' => Author::all(),
            'languages' => Language::all(),
            'subjects' => Subject::all(),
            
        ]);
    }
}
