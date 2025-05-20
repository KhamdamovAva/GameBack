<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\LangResource;
use App\Interfaces\Services\LangServiceInterface;

class LangController extends Controller
{

    public function __construct(protected LangServiceInterface $langService){

    }
    public function index()
    {
        $langs = $this->langService->allLangs();
        return $this->success(LangResource::collection($langs), __('successes.lang.all'));
    }
}
