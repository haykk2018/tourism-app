<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public $timestamps = false;
    protected $fillable = ['name'];
}