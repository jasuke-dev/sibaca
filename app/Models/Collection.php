<?php

namespace App\Models;


use App\Models\Traits\Uuids;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use Uuids,HasFactory,Searchable;

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'inventory_code' => $this->inventory_code,
            'abstract' => $this->abstract,
            'publish_year' => $this->publish_year,
            'language_id' => $this->language_id,
        ];
    }

    protected $guarded = [
        'id',
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'collection_subjects')->withTimestamps(); //meng custom tabel ketiga aslinya collection_subject
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'author_collections')->withTimestamps(); //meng custom tabel ketiga aslinya collection_subject
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_collections')->withTimestamps(); //meng custom tabel ketiga aslinya collection_subject
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function publisher(){
        return $this->belongsTo(publisher::class);
    }

    public function procurement(){
        return $this->belongsTo(procurement::class);
    }

    // public function collection_subject(){
    //     return $this->
    // }
}
