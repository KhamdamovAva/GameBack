<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\LangDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Lang\StoreLangRequest;
use App\Http\Requests\v1\Lang\UpdateLangRequest;
use App\Http\Resources\v1\LangResource;
use App\Interfaces\Services\LangServiceInterface;
use Illuminate\Http\Request;

class LangController extends Controller
{

    public function __construct(protected LangServiceInterface $langService){

    }
    public function index()
    {
        $langs = $this->langService->allLangs();
        return $this->success(LangResource::collection($langs), __('successes.lang.all'));
    }

    public function store(StoreLangRequest $request)
    {
        $langDTO = new LangDTO($request->locale);
        $lang = $this->langService->createLanguage($langDTO);
        return $this->success(new LangResource($lang), __('successes.lang.created'), 201);
    }

    public function show(string $id)
    {
        $lang = $this->langService->getLanguage($id);
        return $this->success(new LangResource($lang));
    }

    public function update(UpdateLangRequest $request, string $id)
    {
        $langDTO = new LangDTO($request->locale);
        $updatedLang = $this->langService->updateLanguage($langDTO, $id);
        return $this->success(new LangResource($updatedLang), __('successes.lang.updated'));

    }

    public function destroy(string $id)
    {
        $this->langService->deleteLanguage($id);
        return $this->success([], __('successes.lang.deleted'));
    }
}
