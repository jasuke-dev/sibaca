<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
    ];
    protected $appends = [ 'full_name' ];

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'author_collections');
    }

    //accessor
    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
