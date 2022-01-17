<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    protected $appends = ['full_name'];

    public function getFullnameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
