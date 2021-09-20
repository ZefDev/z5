<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Step;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index($id)
    {
        $game = Game::find($id);
        if ($game->creater_user_id != Auth::id() && $game->second_user_id==null){
            $game->second_user_id = Auth::id();
            $game->status = 1;
        } elseif ($game->creater_user_id != Auth::id() && $game->second_user_id!=Auth::id()){
            return redirect()->route('home');
        }
        $game->save();
        $choices = Choice::select()->limit($game->step->count)->get();
        return view('game',['game'=>$game,'choices'=>$choices]);
    }

    public function formCreateGame()
    {
        $step = Step::all();
        return view('newGame',['steps'=> $step]);
    }

    public function newGame(Request $request){
        $newgame = new Game;
        $newgame->creater_user_id = Auth::id();
        $newgame->step_id = $request->input('step');
        $newgame->status = 0;
        $newgame->save();
        return redirect()->route('game', ['id' => $newgame->id]);
    }

    public function makeChoice(Request $request){

        $game = Game::find($request->input('idGame'));
        if ($game->creater_user_id !=Auth::id()){
            $game->second_user_id = Auth::id();
            $game->choice_second =  $request->input('choice');
        }
        else{
            $game->choice_creater =  $request->input('choice');
        }
        if ($game->choice_second!=null && $game->choice_creater!= null){
            $game->status = 2;
            $game->result = $this->getResultGame($game->choice_creater,$game->choice_second,$game->step->count);
        }
        $game->save();
        return redirect()->route('result', ['id' => $game->id]);
    }

    public function getResultGame ($x,$l,$step_count)
    {
        $al = $step_count;
        $g = ($al / 2);
        if ($x == $l) {           // NICHIA POPEDA LOSE  user
            return "Draw";
        } else {
            if ($l <= $al) {
                if ($x >= $g + 1) {
                    if (($l >= $x - $g) && ($l < $x)) {
                        return "Lose";
                    } else {
                        return "Win";
                    }
                } else {
                    if (($l <= $x + $g) && ($l > $x)) {
                        return "Win";
                    } else {
                        return "Lose";
                    }
                }
            }
        }
    }
//    public function getResultGame($a,$b,$step_count){
//        $choices = Choice::select()->limit($step_count)->get();
//        $list = [];
//        foreach ($choices as $choice){
//            $list[] = $choice->id;
//        }
//        $curElem = intdiv(count($list), 2);
//        $elemsearch = $list[$b-1];
//
//        $winer = $this->getLists($curElem,$list,$elemsearch,false);
//        $looser = $this->getLists($curElem,$list,$elemsearch,true);
//        var_dump($winer);
//        var_dump($looser);
//        if (in_array("$a", $winer)){
//            return "win";
//        }
//        else if (in_array("$a", $looser)){
//            return "lose";
//        }
//        else {
//            return "Draw";
//        }
//    }
//
//    public function getLists($count, $list, $elemsearch, $reverse){
//        $isFind = false;
//        $tempList = [];
//        if ($reverse){
//            $list = array_reverse($list);
//        }
//
//        for ($i = 0; $i < $count; $i++) {
//
//            $element = $list[$i];
//            if ($element == $elemsearch){
//                $isFind = true;
//            }
//            echo $count;
//            $tempList[] =$element;
//            if ($count == 0){
//                break;
//            }
//            //echo $element." ".$elemsearch." ".$i." ".$isFind." ".($element!=$elemsearch)."<br>";
//            //echo ($element!==$elemsearch)."<br>";
//            //echo "$i";
//            //if ($isFind) { // && ($element!=$elemsearch)
//            //    echo "fddf";
//                //$tempList[] =$element;
//                $count--;
//           // }
//            if (!isset($list[$i+1])){
//                //$i=1;
//            }
//        }
//        foreach  ($list as $iter) {
//            $element ="";
//            //if (isset($list[$count+1])){
//             //   var_dump($list[$count+1]);
//                $element = $iter;
//            //}
//            if ($element == $elemsearch){
//                $isFind = true;
//            }
//            if ($count == 0){
//                break;
//            }
//            if ($isFind && $element!=$elemsearch) {
//                $tempList[] =$element;
//                $count--;
//            }
//            if (!isset($list[$count+1])){
//                //iter = list.listIterator();
//            }
//        }
    //    return $tempList;
   // }


}
