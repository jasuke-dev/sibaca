<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AuthorCollection extends Model
{
    use HasFactory, Searchable;
    public function toSearchableArray()
    {
        return [
            'author_id' => $this->author_id,
        ];
    }
    protected $guarded = [
        'id',
    ];
}
