<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    public function index(){
        return Game::with('fps')->get();
    }
    public function show($id){
        return Game::with('fps')->findOrFail($id);
    }
    public function store($data){
        $game = Game::create([
            'name' => $data['name']
        ]);
        return $game->load('fps');
    }
    public function update($data, $id){
        $game = $this->show($id);
        $game->name = $data['name'];
        $game->save();
        return $game->load('fps');
    }
    public function destroy($id){
        $game = $this->show($id);
        $game->delete();
        return;
    }
}
