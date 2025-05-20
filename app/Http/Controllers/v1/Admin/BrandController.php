<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\BrandDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\v1\BrandResource;
use App\Http\Requests\v1\Brand\StoreBrandRequest;
use App\Http\Requests\v1\Brand\UpdateBrandRequest;
use App\Interfaces\Services\BrandServiceInterface;

class BrandController extends Controller
{
    public function __construct(protected BrandServiceInterface $brandService){

    }

    public function index()
    {
        $brands = $this->brandService->getAllBrands();
        return $this->success(BrandResource::collection($brands), __('successes.brand.all'));
    }

    public function store(StoreBrandRequest $request)
    {
        $brandDTO = new BrandDTO($request->name, Auth::id());
        $brand = $this->brandService->createBrand($brandDTO);
        return $this->success(new BrandResource($brand), __('successes.brand.created'), 201);
    }


    public function show(string $slug)
    {
        $brand = $this->brandService->getBrand($slug);
        return $this->success(new BrandResource($brand), __('successes.brand.show'));

    }

    public function update(UpdateBrandRequest $request, string $id)
    {
        $brandDTO = new BrandDTO($request->name, Auth::id());
        $brand = $this->brandService->updateBrand($brandDTO, $id);
        return $this->success(new BrandResource($brand), __('successes.brand.updated'));

    }

    public function destroy(string $id)
    {
        $this->brandService->deleteBrand($id);
        return $this->success( [],__('successes.brand.deleted'));
    }
}
