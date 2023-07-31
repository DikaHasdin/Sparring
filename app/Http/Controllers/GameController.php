<?php

namespace App\Http\Controllers;

use App\Models\Game;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    public function index(): View
    {
        //get games
        $games = Game::latest()->paginate(5);

        //render view with games
        return view('games.index', compact('games'));
    }

    public function create(): View
    {
        return view('games.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_game'     => 'required|min:5',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/games', $image->hashName());

        //create post
        Game::create([
            'nama_game'     => $request->nama_game,
            'image'     => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('games.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
