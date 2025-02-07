<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingatlan;

class IngatlanController extends Controller
{
    public function index(){
        return response()->json(Ingatlan:: getAllWithCategory(),200); // a response objektum json metódusa a választ json formátumra alakítja
    }
    public function create(Request $request){
        try{
        $valid = $request->validate([  // a request objektum validate metódusa a request objektumot validálja
            'kategoria'=>'required|exists:kategoriak.id', // az exists: tábla,oszlop megadja hogy a kategória táblában létezik e az adott id
            'leiras'=>'required|string',
            'hirdetesDatuma'=>'required|date',
            'tehermentes'=>'required|boolean',
            'ar'=>'required|integer|min:0',
            'kepUrl'=>'required' // ha kötlezeő az adat akkor required kell írni 
        ]);
        $ingatlan = Ingatlan::createIngatlan($valid); // ha a validálás sikeres akkor a createIngatlan metódus meghívása
        return response()->json(['id'=>$ingatlan->id,201]); // a válasz json formátumban
        }
        catch(ValidateException $e){ // ha nem sikerül a validálás akkor a catch blokkba kerül a $e változóban a hibaüzenet
        return response()->json(['massage'=>'Hiányos adatok'],400);
        }
        return response()->json(Ingatlan:: getAllWithCategory(),200);
    }
    public static function delete($id){
        $deling = Ingatlan::deleteIngatlan($id);   // a deleteIngatlan metódus meghívása
        if($deling === null)
        {
        return response()->json(['massege'=>'Ingatlan nem létezik'],404); 
        }
        else
        return response()->json(null,204); 
    }
}