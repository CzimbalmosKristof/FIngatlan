<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingatlan;

class IngatlanController extends Controller
{
    public function index(){
        return response()->json(Ingatlan:: getAllWithCategory(),200);
    }
}
