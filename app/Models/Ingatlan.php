<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    protected $table= 'ingatlanok';
    protected $fillable = ['katgoria','leiras','hirdetesDatuma','tehermentes','ar','kepUrl'];

    public function kategoriak(){

        return $this->belongsTo(Kategoria::class, 'kategoria');
    }

    public static function getAllWithCategory(){
        return self::with('kategoriak:id,nev')->get()->map(function($ingatlan)
        {
            return 
            [
                'id' =>$ingatlan->id,
                'kategoria' =>$ingatlan->kategoriak->nev ?? null,
                'leiras' =>$ingatlan->leiras,
                'hirdetesDatuma'=>$ingatlan->hirdetesDatuma,
                'tehermentes'=>$ingatlan->tehermentes,
                'ar'=> $ingatlan->ar,
                'kepUrl'=>$ingatlan->kepUrl
            ];
        });
    }
    public static function createIngatlan($data){
        return Ingatlan::create($newdata);
    }
    public static function deleteIngatlan($id){

        return Ingatlan::delete($id);
    }
}
