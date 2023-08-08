<?php

namespace App\Http\Controllers;

use App\Models\Game;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

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
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/games', $image->hashName());

        //create game
        Game::create([
            'nama_game'     => $request->nama_game,
            'image'         => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('games.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $game = Game::findOrFail($id);

        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_game'     => 'required|min:5',
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //get game by ID
        $game = Game::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/games', $image->hashName());

            //delete old image
            Storage::delete('public/games/' . $game->image);

            //update game with new image
            $game->update([
                'nama_game'     => $request->nama_game,
                'image'         => $image->hashName(),
            ]);
        } else {

            //update game without image
            $game->update([
                'nama_game'     => $request->nama_game,
            ]);
        }

        //redirect to index
        return redirect()->route('games.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get game by ID
        $game = Game::findOrFail($id);

        //delete image
        Storage::delete('public/games/'. $game->image);

        //delete game
        $game->delete();

        //redirect to index
        return redirect()->route('games.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
