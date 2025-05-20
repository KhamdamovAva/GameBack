<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Game\StoreGameRequest;
use App\Http\Requests\v1\Game\UpdateGameRequest;
use App\Http\Resources\v1\GameResource;
use App\Services\GameService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class GameController extends Controller
{
    public function __construct(protected GameService $gameService){}
    public function index(){
        $games = $this->gameService->allGame();
        return $this->success(GameResource::collection($games), __('successes.game.all'));
    }
    public function store(StoreGameRequest $request){
        $game = $this->gameService->createGame($request->name);
        return $this->success(new GameResource($game), __('successes.game.created'), 201);
    }
    public function show($id){
        $game = $this->gameService->showGame($id);
        return $this->success(new GameResource($game), __('successes.game.show'));
    }
    public function update(UpdateGameRequest $request, $id){
        $game = $this->gameService->updateGame($request->name, $id);
        return $this->success(new GameResource($game), __('successes.game.updated'));
    }
    public function destroy($id){
        $this->gameService->deleteGame($id);
        return $this->success([], __('successes.game.deleted'));
    }
}
