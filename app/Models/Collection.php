<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'collection_subjects')->withPivot('subject')->withTimestamps(); //meng custom tabel ketiga aslinya collection_subject
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'author_collections')->withPivot('author')->withTimestamps(); //meng custom tabel ketiga aslinya collection_subject
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    // public function collection_subject(){
    //     return $this->
    // }
}
