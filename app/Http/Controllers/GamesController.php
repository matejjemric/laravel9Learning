<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GamesController extends Controller
{
   
    public function index()
    {   
        return view('game/welcome',[
            'games' => DB::table('games')
            ->orderBy('id','desc')
            ->get()
        ]);
    }

    public function create()
    {
        return view('game/create');
    }

    public function store(Request $request)
    {
        // Set up the form validation
        $validator = Validator::make(
            request()->all(),
            array(
                'gameIconUrl' => 'required|string|max:255'
            )
        );
        if ($validator->fails()){
          return back()->withErrors($validator->errors())->withInput();
        }

        $game = new Game;
        $game->gameIconUrl = $request->input('gameIconUrl');
        $game->save();

        return redirect()
            ->route('game.index')
            ->with('success','Game created');
    }

    public function edit($id)
    {
        $game = DB::table('games')->find($id);

        return view('game/edit',['game' => $game]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gameIconUrl' => 'required'
        ]);

        DB::table('games')
                ->where('id',$id)
                ->update([
                    'gameIconUrl' => $request->gameIconUrl
                ]);

        return redirect()
            ->route('game.index')
            ->with('success','Game updated');
    }

    // not used for now
    // public function show($id)
    // {
    //     $game = DB::table('games')->find($id);

    //     return view('show',['game' => $game]);
    // }

    public function destroy($id)
    {
        DB::table('games')->where('id',$id)->delete();

        return redirect()
            ->route('games.index')
            ->with('success','Game deleted');
    }

}
