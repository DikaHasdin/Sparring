<?php

namespace App\Http\Controllers;

use App\Models\Game;

use Illuminate\View\View;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(): View
    {
        //get games
        $games = Game::latest()->paginate(5);

        //render view with games
        return view('games.index', compact('games'));
    }
}
