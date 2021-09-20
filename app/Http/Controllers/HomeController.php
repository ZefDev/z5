<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Step;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $step = Step::all();
        $games= Game::where('status', 0)
            ->get();
        return view('home',['steps'=>$step,'games'=>$games]);
    }
    public function indexById($stepId)
    {
        $step = Step::all();
        $games= Game::where('status', 0)
            ->where('step_id', $stepId)
            ->get();

        return view('home',['steps'=>$step,'games'=>$games]);
    }

}
