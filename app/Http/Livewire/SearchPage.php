<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Author;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Language;
use App\Models\Collection;
use Livewire\WithPagination;
use SebastianBergmann\Environment\Console;

class SearchPage extends Component
{
    use WithPagination;
    public $query;
    public $type;
    public $author;
    public $language;
    public $subject = [];
    public $counter = 0;
    protected $queryString = ['query','type','author','language','subject'];

    // protected $listeners = ['contentChanged' => 'setEvent'];

    // public function setEvent()
    // {
    //     $this->dispatchBrowserEvent('contentChanged');
    // }
    public function updatingLanguage(){
        $this->gotoPage(1);
    }
    public function updatingQuery(){
        $this->gotoPage(1);
    }
    public function updatingType(){
        $this->gotoPage(1);
    }
    public function updatingAuthor(){
        $this->gotoPage(1);
    }
    public function updatingSubject(){
        $this->gotoPage(1);
    }

    protected $listeners = ['subjectChanged','rere'=>'$refresh'];

    public function setAuthor($id){
        $this->author = $id;
    }
    public function setSubject($code){
        $this->subject = [$code];
        // array_push($this->subject,$code);
    }
    public function ResetPage()
    {
        $this->type = null;
        $this->author = null;
        $this->language = null;
        $this->subject = [];        
    }

    public function subjectChanged($value){        
        $this->dispatchBrowserEvent('subject-updated',[
            'type' => 'success',
            'newSubject' => $value
        ]);
    }

    public function reRenderSubject($value){
        $this->dispatchBrowserEvent('subject-updated',[
            'type' => 'success',
            'newSubject' => $value
        ]);
    }

    public function render()
    {
        $this->reRenderSubject($this->subject);
        $this->counter++;
        // dd(Collection::with('authors','subjects')
        //                             ->where('title', 'LIKE', "%$this->query%" ?? '%')
        //                             ->where('abstract','LIKE', "%$this->query%" ?? '%')
        //                             ->when($this->type, function($query, $type){
        //                                 return $query->where('type_id','LIKE',$type);
        //                             })
        //                             ->when($this->author, function($query){
        //                                 return $query->WhereHas('authors', function($query){
        //                                     $query->where('author_id','LIKE',$this->author);
        //                                 });
        //                             })
        //                             ->when($this->language, function($query, $language){
        //                                 return $query->where('language_code','LIKE',$language);
        //                             })
        //                             ->when($this->subject, function($query, $subject){
        //                                 return $query->WhereHas('subjects', function($query){
        //                                     $query->WhereIn('subjects.code', $this->subject);
        //                                 });
        //                             })
        //                             ->paginate(10));
        return view('livewire.search-page',[
            'results' => Collection::with('authors','subjects')
                                    ->where('title', 'LIKE', "%$this->query%" ?? '%')
                                    // ->where('abstract','LIKE', "%$this->query%" ?? '%') gabisa pake abstract orwwhere
                                    ->when($this->type, function($query, $type){
                                        return $query->where('type_id',$type);
                                    })
                                    ->when($this->author, function($query){
                                        return $query->WhereHas('authors', function($query){
                                            $query->where('author_id','LIKE',$this->author);
                                        });
                                    })
                                    ->when($this->language, function($query, $language){
                                        return $query->where('language_code','LIKE',$language);
                                    })
                                    ->when($this->subject, function($query, $subject){
                                        return $query->WhereHas('subjects', function($query){
                                            $query->WhereIn('subjects.code', $this->subject);
                                        });
                                    })
                                    ->paginate(10),
            'types' => Type::all(),
            'authors' => Author::all(),
            'languages' => Language::all(),
            
        ]);
    }
}
