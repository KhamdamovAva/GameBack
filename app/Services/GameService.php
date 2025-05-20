<?php

namespace App\Services;

use App\Repositories\GameRepository;

class GameService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected GameRepository $gameRepository){}

    public function allGame(){
        return $this->gameRepository->index();
    }

    public function createGame($name){
        $data = [
            'name' => $name
        ];
        return $this->gameRepository->store($data);
    }
    public function showGame($id){
        return $this->gameRepository->show($id);
    }
    public function updateGame($name, $id){
        $data = [
            'name' => $name
        ];
        return $this->gameRepository->update($data, $id);
    }
    public function deleteGame($id){
        return $this->gameRepository->destroy($id);
    }
}
