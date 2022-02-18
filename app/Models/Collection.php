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

    public function subject(){
        return $this->belongsToMany(Subject::class, 'collection_subjects'); //meng custom tabel ketiga aslinya collection_subject
    }

    // public function collection_subject(){
    //     return $this->
    // }
}
