<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo('App\Models\BookSection', 'section_id');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\BookAuthor', 'author_id');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\BookYear', 'year_id');
    }
}
