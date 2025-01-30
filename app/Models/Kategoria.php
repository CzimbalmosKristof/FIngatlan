<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table= 'kategoriak';
    protected $fillable = ['nev'];

    public function ingatlanok(){

        return $this->hasMany(Ingatlan::class, 'kategoria');
    }
}
