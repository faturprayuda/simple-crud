<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function Artikel()
    {
        return $this->hasMany(Artikel::class);
    }
}
