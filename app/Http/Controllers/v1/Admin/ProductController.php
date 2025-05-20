<?php
namespace App\Http\Controllers\v1\Admin;

use App\DTO\ProductDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Product\ProductResource;
use App\Interfaces\Services\ProductServiceInterface;
use App\Http\Requests\v1\Product\StoreProductRequest;
use App\Http\Requests\v1\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $productService)
    {

    }
    public function index(Request $request)
    {
        $page = intval($request->p ?? 12);
        $products = $this->productService->getAllProducts($page);
        return $this->responsePagination($products, ProductResource::collection($products), __('successes.products.all'));
    }
    public function store(StoreProductRequest $request)
    {
        $brand_id = (int) $request->brand_id;
        $category_id = (int) $request->category_id;
        $productDTO = new ProductDTO($request->translations, $request->images, $request->price, $request->discount, $brand_id, $request['attributes'], $request->statuses, $request->type, $category_id);
        $product = $this->productService->getCreatedProduct($productDTO);
        return $this->success(new ProductResource($product), __('successes.products.created'), 201);
    }
    public function show(string $slug)
    {
        $product = $this->productService->getProduct($slug);
        return $this->success(new ProductResource($product), __('successes.products.show'));
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $productDTO = new ProductDTO($request->translations, $request->images, $request->price, $request->discount, $request->brand_id, $request['attributes'], $request->statuses, $request->type, $request->category_id);
        $updatedProduct = $this->productService->getUpdatedProduct($productDTO, $id);
        return $this->success(new ProductResource($updatedProduct), __('successes.products.updated'));
    }
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return $this->success([], __('successes.products.deleted'));
    }

}
