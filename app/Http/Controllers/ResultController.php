<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index($id)
    {
        $game = Game::find($id);
        return view('result',['game'=>$game]);
    }
}
